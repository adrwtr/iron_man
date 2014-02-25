<?
class TestOfIMSqlParserInsert extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'banco_dados/sql_parser/IMSqlParserInsert.class.php' );
      $this->obj = new IMSqlParserInsert();
   }

   public function testOfparse()
   {
      $obj = $this->obj;

      $sql = " insert into tabela ( coisa1, coisa 2)    values ( 1, 'valor2' ); ";

      $tabela     = 'TABELA';
      $arrCampos  = array( 'COISA1', 'COISA 2');
      $arrValores = array( 1, '\'VALOR2\'');

      $arrMerge  = array( 'COISA1' => 1, 'COISA 2' => '\'VALOR2\'' );

      $this->obj->parse( $sql );



      $this->assertTrue( $this->obj->getStrTableName() == $tabela,     'Parse - Não conseguiu achar o nome da tabela');
      $this->assertTrue( $this->obj->getArrCampos() == $arrCampos,     'Parse - Não conseguiu achar os campos');
      $this->assertTrue( $this->obj->getArrValores() == $arrValores,   'Parse - Não conseguiu achar os valores');
      $this->assertTrue( $this->obj->mergeArray() == $arrMerge,        'Parse - Não conseguiu fazer o merge');
   }  
}
?>