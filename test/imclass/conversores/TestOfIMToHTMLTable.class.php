<?
class TestOfIMToHTMLTable extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'conversores/IMToHTMLTable.class.php' );
      require_once( C_PATH_CLASS . 'banco_dados/IMResultado.class.php' );
      $this->objIMToHTMLTable = new IMToHTMLTable();
   }

   public function testOfconvertIMResultado()
   {
      $objIMResultado = new IMResultado();
      $objIMResultado->set( array( array( 'titulo1' => 'valor1', 'titulo2' => 'valor2' ) ) );

      $valor_final = $this->objIMToHTMLTable->convertIMResultado( $objIMResultado );



      $tabela = '<table width="" border="1" cellpadding="4" cellspacing="0" class="t">';
      $tabela .= "<tr class=\"t titulo\">";

      $tabela .= "<td>";
      $tabela .= 'titulo1';
      $tabela .=  "</td>";

      $tabela .= "<td>";
      $tabela .= 'titulo2';
      $tabela .=  "</td>";

      $tabela .=  "</tr>";


      $tabela .=  "<tr>";

      $tabela .=  "<td>";
      $tabela .=  'valor1';
      $tabela .=  "</td>";

      $tabela .=  "<td>";
      $tabela .=  'valor2';
      $tabela .=  "</td>";

      $tabela .=  "</tr>";

      $tabela .=  '</table>';

//      echo "\n";
//      echo $tabela;
//      echo "\n";
//      echo $valor_final;
//      echo "\n";

      $this->assertTrue( $tabela == $valor_final, 'O Conversos para tabela html não funcionou' );

   }  
}
?>