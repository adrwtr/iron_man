<?
class TestOfIMHtmlTd extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'html/table/IMHtmlTd.class.php' );

      $this->objIMHtmlTd = new IMHtmlTd();
   }

   public function testOfTest()
   {

      // $this->assertTrue( $tabela == $valor_final, 'O Conversos para tabela html não funcionou' );

   }  
}
?>