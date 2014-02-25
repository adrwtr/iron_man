<?
class TestOfIMHtmlTable extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'html/IMHtmlTable.class.php' );

      $this->objIMHtmlTable = new IMHtmlTable();
   }

   public function testOfTest()
   {

      // $this->assertTrue( $tabela == $valor_final, 'O Conversos para tabela html não funcionou' );

   }  
}
?>