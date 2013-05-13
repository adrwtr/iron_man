<?
class TestOfIMConexaoAtributos extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'banco_dados/IMConexaoAtributos.class.php' ); 
      $this->obj = new IMConexaoAtributos();
   }

   public function testOfgetPDOMysqlString()
   {
      $obj = $this->obj;

      $obj->setNomeBanco("nome");
      $obj->setLogin("login");
      $obj->setSenha("senha");
      $obj->setBanco("banco");
      $obj->setHost("host");
      $obj->setPorta("porta");
      
      $this->assertTrue( 'mysql:host=host;dbname=banco;' == $obj->getPDOMysqlString(), 'getPDOMysqlString - Erro ao gerar string para mysql' );      
   }  
}
?>