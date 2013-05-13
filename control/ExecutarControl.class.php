<?
class ExecutarControl {

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

   public function setConexao( $objConexao = null)
   {
      $this->objIMConexaoBancoDados = $objConexao;
   }

   


}
?>