<?
require_once( C_PATH_CLASS . 'apps/AppConcreto.php' );
require_once( C_PATH_CLASS . 'apps/inputs/InputText.php' );
require_once( C_PATH_CLASS . 'apps/inputs/InputConexoesMysql.php' );


class clearEstagio extends AppConcreto {

   /**
    * Construtor
    */
   public function __construct()
   {      
      $this->setDescricao('Apaga um estágio e todas as suas tabelas dependentes de uma pessoa em uma conexão');      
      $this->setCampos();
   }

   /**
    * Cria os campos necessários
    */
   public function setCampos()
   {
      $objInputText = new InputText();
      $objInputText->setNome('cd_estagio');
      $objInputText->setLabel('Código do Estágio');

      $this->setInput( $objInputText );


      $objInputConexoesMysql = new InputConexoesMysql();
      $objInputConexoesMysql->setNome('nm_obj_conexao');

      $this->setInput( $objInputConexoesMysql );
   }

   /**
    * Executa a função
    */
   public function executar()
   {      
      $cd_estagio     = $this->getInputValor( 'cd_estagio' );
      $nm_obj_conexao = $this->getInputValor( 'nm_obj_conexao' );

      $objIMConexaoBancoDados = $this->getConexao( $nm_obj_conexao );

      if ( $objIMConexaoBancoDados != null )
      {         
         $query[] = "
         DELETE FROM estnc_titulos_visualizados where cd_titulo in ( select cd_titulo from estnc_titulos where cd_estagio in (
         $cd_estagio
          ) );
         ";

         $query[] = "
         DELETE FROM estnc_impressoes_aviso where cd_titulo in ( select cd_titulo from estnc_titulos where cd_estagio in (
            $cd_estagio
         ) );
         ";

         $query[] = "
         DELETE FROM estnc_avaliacoes_deferidas where cd_estagio in ( $cd_estagio );
         ";

         $query[] = "
         DELETE FROM estnc_avaliacoes_respondidas where cd_estagio in ( $cd_estagio );
         ";

         $query[] = "
         DELETE FROM estnc_avaliacoes_agendar where cd_estagio in ( $cd_estagio );
         ";

         $query[] = "
         DELETE FROM estnc_estagios where cd_vaga_origem in ( $cd_estagio);
         ";

         $query[] = "
         DELETE FROM estnc_titulos_departamentos where cd_titulo in ( select cd_titulo from estnc_titulos where cd_estagio in (
            $cd_estagio
         ) );
         ";

         $query[] = "
         DELETE FROM estnc_titulos_horarios where cd_estagio in (
            $cd_estagio
          );
         ";

         $query[] = "
         DELETE FROM estnc_titulos where cd_estagio in ( SELECT cd_estagio FROM estnc_estagios where cd_vaga_origem in (
          $cd_estagio
          ) );
         ";

         $query[] = "
         DELETE FROM estnc_titulos where cd_estagio in (
            $cd_estagio
          );
         ";

         $query[] = "
         DELETE FROM estnc_estagios where cd_estagio in (
            $cd_estagio
         );
         ";

         foreach( $query as $id => $v )
         {
            echo $v . "<BR>";
            $objIMConexaoBancoDados->executa( $v );
         }
      }
   }

   /**
    * Tira o .class.php do nome da classe
    * @param  [str] $valor [nome da classe]
    * @return [str]
    */
   private function arrumaClasse( $valor )
   {
      return str_replace( '.class.php', '', $valor ); 
   }

   /**
    * Retorna uma conexão ativa baseado no nome da classe
    * @param  [str] $nm_classe [description]
    * @return [IMConexaoBancoDados]            [objeto construido e conectado]
    */
   private function getConexao( $nm_classe )
   {
      $objInputConexoesMysql = new InputConexoesMysql();
      require_once( $objInputConexoesMysql->getDirConexoes() . $nm_classe );

      $class = $this->arrumaClasse( $nm_classe );
      
      $objInterface = new $class;
      $objIMConexaoBancoDados = $objInterface->getConexao();

      if ( $objIMConexaoBancoDados->getIsConnected() == true )
      {
         return $objIMConexaoBancoDados;
      }

      return null;
   }
}
?>