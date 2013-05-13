<?
class IMExecuta {

   private $objIMConexaoBancoDados;

   private $tabela_temp;
   private $tabela_executa;
   private $tabela_tree;
   
   public function __construct()
   {
      $this->tabela_temp      = 'im_executa_temp';
      $this->tabela_tree      = 'im_executa_tree';
      $this->tabela_executa   = 'im_executa';
      
      $this->objIMConexaoBancoDados = null;      
   }

   private function getConexao()
   {
      return $this->objIMConexaoBancoDados;
   }

   public function setConexao( $objIMConexaoBancoDados )
   {
      $this->objIMConexaoBancoDados = $objIMConexaoBancoDados;
   }



   /**
    * Salva a classe em banco em um lugar especifico da memoria
    * 
    * @param  [string] $tabela     [nome da tabela]
    * @param  [string] $descricao  [Descricao da tabela]
    * @param  [string] $classe     [nome da classe]
    * @param  [array] $atributos  [atributos da classe]
    * @return [int]               [true para sucesso]
    */
   public function salvar( $tabela, $descricao, $classe, $comando, $parametros, $nr_ordem='', $usar_retorno )
   {
      // recupera ultima ordem      
      if ( $nr_ordem == '' )
      {
         $q        = "select max(nr_ordem) as nr_ordem from $tabela";
         $objIMPDOStatement = $this->getConexao()->query( $q );
         $arrOrdem = $objIMPDOStatement->toIMResultado()->get();
         $nr_ordem = $arrOrdem[0]['nr_ordem'] + 1;       
      }

      if ( is_array($atributos) )
      {
         require_once( C_PATH_CLASS . 'php/IMJson.class.php' );
         
         $atributos = IMJson::encode( $atributos );         
      }

      $atributos = addslashes( $atributos );

      $query = "
         insert into $tabela ( ds_descricao, ds_classe, ds_comando, cd_memoria_parametro, nr_ordem, sn_usar_retorno ) values ( 
            '$descricao', '$classe', '$comando', '$parametros', '$nr_ordem', '$usar_retorno'
         )
      ";
      
      return $this->objIMConexaoBancoDados->executa( $query );
   }

   /**
    * Recupera um valor da memoria
    * 
    * @param  [string] $tabela   [nome da tabela]
    * @param  [int] $id          [codigo do local aonde foi salvo]
    * @return [array]            [resultado em memoria]
    */
   public function get( $tabela, $id )
   {
      $query = "select * from $tabela where id=". $id;
      $objIMPDOStatement = $this->getConexao()->query( $query );

      return $objIMPDOStatement->toIMResultado()->get();
   }

   public function SalvarExecutaTemporaria( $descricao, $classe, $comando, $parametros, $usar_retorno )
   {
      $tabela = $this->tabela_temp;

      $this->salvar( $tabela, $descricao, $classe, $comando, $parametros, $nr_ordem, $usar_retorno );
   }


   public function clear( $tabela )
   {
      $query = "truncate table $tabela";
      return $this->getConexao()->executa( $query );
   }

   public function limparExecutaTemporaria()
   {
      $tabela = $this->tabela_temp;
      $this->clear( $tabela );
   }

   public function delete( $tabela, $id )
   {
      $query = "delete from $tabela where id=$id";
      return $this->getConexao()->executa( $query );
   }

   public function deleteFromExecutaTemporaria( $id )
   {
      $tabela = $this->tabela_temp;
      return $this->delete( $tabela, $id );
   }

   public function getFromExecutaTemporaria( $id )
   {
      $tabela = $this->tabela_temp;
      return $this->get( $tabela, $id );
   }

   /**
    * Salva a pilha de execução temporaria
    *
    * @param  [descricao] [descrição da execucao]
    */
   public function SalvaPilhaExecucao( $descricao )
   {
      require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
      
      $objIMMemoria = new IMMemoria();
      $objIMMemoria->setConexao( $this->objIMConexaoBancoDados );

      // cria execução com descricao
      $tabela = $this->tabela_executa;

      $query = "
         insert into $tabela ( ds_descricao ) values ( 
            '$descricao'
         )
      ";
            
      $this->objIMConexaoBancoDados->executa( $query );
      $id = $this->objIMConexaoBancoDados->getLastInsertId();

      // recupera pilha temporaria
      $tabela = $this->tabela_temp;
      $query = "select * from $tabela order by nr_ordem asc";
      $objIMPDOStatement = $this->getConexao()->query( $query );

      $arrPilha = $objIMPDOStatement->toIMResultado()->get();
      $tabela   = $this->tabela_tree;

      foreach ($arrPilha as $pilha_id => $pilha_v) 
      {
         $descricao  = $pilha_v['ds_descricao'];
         $classe     = $pilha_v['ds_classe'];
         $comando    = $pilha_v['ds_comando'];
         $parametros = $pilha_v['cd_memoria_parametro'];
         $nr_ordem   = $pilha_v['nr_ordem'];

         $sn_usar_retorno   = $pilha_v['sn_usar_retorno'];

         // primeiro salva o parametro na tabela info
         $parametros = $objIMMemoria->clonarMemoriaTemporariaParaInfo( $parametros );

         $query = "
            insert into $tabela ( cd_executa, ds_descricao, ds_classe, ds_comando, cd_memoria_parametro, nr_ordem, sn_usar_retorno ) values ( 
            '$id', '$descricao', '$classe', '$comando', '$parametros', '$nr_ordem', '$sn_usar_retorno'
         )
         ";  

         $this->objIMConexaoBancoDados->executa( $query );
      }
   }

   public function OrdenarTemporaria( $id, $ordem )
   {

      if ( $ordem == 'cima')
      {
         $operador = '<';
         $ordem    = 'desc';
      }
      else
      {
         $operador = '>';
         $ordem    = 'asc';
      }

      $tabela     = $this->tabela_temp;
      $arrValor   = $this->get( $tabela, $id );

      $nr_ordem_antiga  = $arrValor[0]['nr_ordem'];
      $cd_valor         = $id;

      $query = "
         select * from $tabela where nr_ordem $operador $nr_ordem_antiga order by nr_ordem $ordem limit 1
      ";
      
      $objIMPDOStatement = $this->getConexao()->query( $query );
      $arrValorTrocar    = $objIMPDOStatement->toIMResultado()->get();

      $nova_ordem        = $arrValorTrocar[0]['nr_ordem'];
      $cd_valor_trocar   = $arrValorTrocar[0]['id'];

      // update 1
      $query = "update $tabela set nr_ordem = $nova_ordem where id = $cd_valor";
      $this->objIMConexaoBancoDados->executa( $query );


      // update 2
      $query = "update $tabela set nr_ordem = $nr_ordem_antiga where id = $cd_valor_trocar";
      $this->objIMConexaoBancoDados->executa( $query );

   }




   /**
    * Salva a pilha de execução baseado em uma execução antiga
    *
    * @param  [descricao] [descrição da execucao]
    */
   public function SalvaNovaExecucao( $id_execucao_antiga, $descricao, $request )
   {   
      
      require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
      require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );

      $objIMMemoria = new IMMemoria();
      $objIMMemoria->setConexao( $this->objIMConexaoBancoDados );


      $q = "select * from im_executa_tree where cd_executa = $id_execucao_antiga order by nr_ordem asc";
      $arrLista = $this->objIMConexaoBancoDados->query( $q )->toIMResultado()->get();


      // cria execução com descricao
      $tabela = $this->tabela_executa;
 
      $query = "
         insert into $tabela ( ds_descricao ) values ( 
            '$descricao'
         )
      ";
            
      $this->objIMConexaoBancoDados->executa( $query );
      $id = $this->objIMConexaoBancoDados->getLastInsertId();

      
      $tabela           = $this->tabela_tree;
      $contador_tabela  = 0;

      foreach ( $arrLista as $pilha_id => $pilha_v ) 
      {
         $descricao  = $pilha_v['ds_descricao'];
         $classe     = $pilha_v['ds_classe'];
         $comando    = $pilha_v['ds_comando'];
         $nr_ordem   = $pilha_v['nr_ordem'];

         $cd_memoria_parametro = $pilha_v['cd_memoria_parametro'];

         $sn_usar_retorno   = $pilha_v['sn_usar_retorno'];


         $string_valor_alterado = $_REQUEST['string_' . $contador_tabela ];

         // valor da memoria foi alterada
         if ( $string_valor_alterado != '' )
         {
            $objIMString = new IMString();

            $objIMString->set( $string_valor_alterado );
            $objUMReflection = new IMReflection( $objIMString );

            $objIMMemoria->SalvarMemoriaInformacoes( "", 'IMString', $objUMReflection->getAtributos() );
            $id_memoria = $this->objIMConexaoBancoDados->getLastInsertId();
            $parametros = $id_memoria;
         }

         /**
          * Parametro que foi alterado
          */         
         $valor_memoria_temp = $request['memoria_temp_' . $contador_tabela ];
         $valor_memoria_info = $request['memoria_info_' . $contador_tabela ];

         if ( $valor_memoria_info != '' )
         {
            $cd_memoria_parametro = $valor_memoria_info;            
         }
         else
         {
            if ( $valor_memoria_temp != '' )
            {
               // precisamos tirar do temp e jogar para o info               
               $cd_memoria_parametro = $objIMMemoria->clonarMemoriaTemporariaParaInfo( $valor_memoria_temp );                   
            }           
         }

         $query = "
            insert into $tabela ( cd_executa, ds_descricao, ds_classe, ds_comando, cd_memoria_parametro, nr_ordem, sn_usar_retorno ) values ( 
            '$id', '$descricao', '$classe', '$comando', '$cd_memoria_parametro', '$nr_ordem', '$sn_usar_retorno'
         )
         ";  

         $this->objIMConexaoBancoDados->executa( $query );

         $contador_tabela = $contador_tabela + 1;
      }

      return $id;
   }

   /**
    * Apaga uma execução completa
    * 
    * @param  [cd_execucao] $id [description]
    * @return [type]     [description]
    */
   public function deleteExecucao( $id )
   {


      $tabela = $this->tabela_tree;
      $query = "delete from $tabela where cd_executa=$id";
      $this->getConexao()->executa( $query );

      $tabela = $this->tabela_executa;
      $this->delete( $tabela, $id );


   }


   /**
    * Retorna a lista de comandos a ser executado de um id
    * 
    * @param  [int] $id    [description]
    * @return [array objs] [description]
    */
   public function getListaExecucaoById( $id )
   {
      $q = "select * from im_executa_tree where cd_executa = $id order by nr_ordem asc";
      $arrLista = $this->objIMConexaoBancoDados->query( $q )->toIMResultado()->get();

      return $arrLista;
   }
}
?>