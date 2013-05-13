<?
class TestOfIMTabela extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'banco_dados/IMTabela.class.php' );       
      $this->obj = new IMTabela();
   }

}
?>