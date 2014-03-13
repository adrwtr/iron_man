<?
class TestOfIMHtmlTr extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'html/table/IMHtmlTr.class.php' );

      $this->objIMHtmlTr = new IMHtmlTr();
   }

   public function testOfTest()
   {

      // $this->assertTrue( $tabela == $valor_final, 'O Conversos para tabela html não funcionou' );

   }  
}
?>