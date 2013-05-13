<?
class TestOfIMReflection extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'php/IMReflection.class.php' ); 
      require_once( C_PATH_CLASS . 'base/IMString.class.php' ); 

      $this->obj = new IMReflection(  new IMString('teste') );
   }

   public function testOfgetAtributos()
   {
      $arrAtributos = $this->obj->getAtributos();
      
      $arrTeste = array(
         'string' => 'teste'
      );

      $this->assertTrue( $arrTeste == $arrAtributos, 'Erro de teste de reflexao de atributos' );            
   }

   public function testOfgetMetodos()
   {
      $arrMetodos = $this->obj->getMetodos();

      $arrTeste = array(
         '__construct'  => array( 0 => "str"),
         'get'          => array(),
         'set'          => array( 0 => "valor")
      );

      $this->assertTrue( $arrTeste == $arrMetodos, 'Erro de teste de reflexao de metodos' );              
   }

   public function testOfgetNome()
   {
      $this->assertTrue( 'IMString' == $this->obj->getNome(), 'Erro de teste de reflexao de nome da classe' );              
   }

  

}
?>