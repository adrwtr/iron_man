<?
class ConexaoControl {

   private $objIMConexaoBancoDados;

   public function __construct()
   {
      $this->objIMConexaoBancoDados = null;
   }

   /**
    * Header location 
    * 
    * @param  [type] $url [description]
    * @return [type]      [description]
    */
   public function goto( $url )
   {
      header("Location: ". $url );
   }

   /**
    * Retorna a conexao com o banco official
    * 
    * @return [IMConexaoAtributos] [atributos]
    */
   public function getAtributosdeConexao()
   {
      require_once( C_PATH_CLASS . 'banco_dados/IMConexaoAtributos.class.php' );
      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("Iron Man");
      $objIMConexaoAtributos->setLogin("backup");
      $objIMConexaoAtributos->setSenha("");
      $objIMConexaoAtributos->setBanco("adriano");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");

      return $objIMConexaoAtributos;
   } 
}
?>