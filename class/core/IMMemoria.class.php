<?
class IMMemoria {

   private $objIMConexaoBancoDados;
   private $tabela_temp;
   private $tabela_info;
   
   public function __construct()
   {
      $this->tabela_temp = 'im_memoria_temp';
      $this->tabela_info = 'im_memoria_info';
      $this->objIMConexaoBancoDados = null;      
   }

   private function getConexao()
   {
      return $this->objIMConexaoBancoDados;
   }

   public function setConexao( $objIMConexaoBancoDados=null )
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
   public function salvar( $tabela, $descricao, $classe, $atributos )
   {      
      if ( is_array($atributos) )
      {
         require_once( C_PATH_CLASS . 'php/IMJson.class.php' );
         
         $atributos = IMJson::encode( $atributos );         
      }

      $atributos = addslashes( $atributos );

      $query = "
         insert into $tabela ( ds_descricao, ds_classe, ds_parametros, dt_cadastro ) values ( 
            '$descricao', '$classe', '$atributos', now()
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
      
      $objIMPDOStatement = $this->objIMConexaoBancoDados->query( $query );

      return $objIMPDOStatement->toIMResultado()->get();
   }

   public function SalvarMemoriaTemporaria( $descricao, $classe, $atributos )
   {
      $tabela = $this->tabela_temp;

      $this->salvar( $tabela, $descricao, $classe, $atributos );
   }

   public function SalvarMemoriaInformacoes( $descricao, $classe, $atributos )
   {
      $tabela = $this->tabela_info;

      $this->salvar( $tabela, $descricao, $classe, $atributos );
   }

   public function clear( $tabela )
   {
      $query = "truncate table $tabela";
      return $this->getConexao()->executa( $query );
   }

   public function limparMemoriaTemporaria()
   {
      $tabela = $this->tabela_temp;
      $this->clear( $tabela );
   }

   public function delete( $tabela, $id )
   {
      $query = "delete from $tabela where id=$id";
      return $this->getConexao()->executa( $query );
   }

   public function deleteFromMemoriaTemporaria( $id )
   {
      $tabela = $this->tabela_temp;
      return $this->delete( $tabela, $id );
   }

   public function getFromMemoriaTemporaria( $id )
   {
      $tabela = $this->tabela_temp;
      return $this->get( $tabela, $id );
   }

   public function deleteFromMemoriaInfo( $id )
   {
      $tabela = $this->tabela_info;
      return $this->delete( $tabela, $id );
   }

   /**
    * Clona o id da memoria temporaria para a memoria info
    * 
    * @param  [int] $id [codigo da memoria temporaria]
    * @return [int]     [codigo da memoria info que acabou de inserir]
    */
   public function clonarMemoriaTemporariaParaInfo( $id )
   {
      $arrTemp = $this->getFromMemoriaTemporaria( $id );
      $arrTemp = $arrTemp[0];

      $this->SalvarMemoriaInformacoes( $arrTemp['ds_descricao'], $arrTemp['ds_classe'], $arrTemp['ds_parametros'] );

      return $this->objIMConexaoBancoDados->getLastInsertId();
   }


   public function getFromMemoriaInfo( $id )
   {
      $tabela = $this->tabela_info;
      return $this->get( $tabela, $id );
   }

   /**
    * Recupera todos os registros de mesma classe da memoria
    * 
    * @param  [string] $ds_classe [nome classe]
    * @return [array] memoria com a mesma classe
    */
   public function getRelacionadosFromMemoriaInfo( $ds_classe )
   {
      $tabela = $this->tabela_info;
      $query = "select * from $tabela where ds_classe='". $ds_classe ."'";         
     
      $objIMPDOStatement = $this->objIMConexaoBancoDados->query( $query );

      return $objIMPDOStatement->toIMResultado()->get();
   }

   /**
    * Recupera todos os registros de mesma classe da memoria temporaria
    * 
    * @param  [string] $ds_classe [nome classe]
    * @return [array] memoria com a mesma classe
    */
   public function getRelacionadosFromMemoriaTemporaria( $ds_classe )
   {
      $tabela = $this->tabela_temp;
      $query = "select * from $tabela where ds_classe='". $ds_classe ."'";   
     
      $objIMPDOStatement = $this->objIMConexaoBancoDados->query( $query );

      return $objIMPDOStatement->toIMResultado()->get();
   }


}
?>