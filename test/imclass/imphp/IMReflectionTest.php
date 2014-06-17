<?
namespace test\imclass\imphp;

use imclass\imphp\IMReflection;
use imclass\apps\inputs\InputText;


class IMReflectionTest extends \PHPUnit_Framework_TestCase
{    
   public function testgettersetters()
   {
      $objIMReflectionTest = new IMReflection(  new InputText() );
      $objIMReflectionTest->setobjReflectionClass( new InputText() );

      $this->assertEquals( 
         'ReflectionClass', 
         get_class( $objIMReflectionTest->getobjReflectionClass() ) 
      );

      $this->assertEquals( 
         'imclass\apps\inputs\InputText', 
         $objIMReflectionTest->getName()
      );

      $this->assertEquals( 
         'imclass\apps\inputs\InputText', 
         $objIMReflectionTest->getNome()
      );
   }


   public function testOfgetAtributos()
   {
      $objIMReflectionTest = new IMReflection( new InputText() );
      $arrAtributos = $objIMReflectionTest->getAtributos();
      
      $arrTeste = array(
         'nome'  => null,
         'label' => null
      );

      $this->assertEquals( $arrTeste, $arrAtributos );            
   }

   public function testOfgetMetodos()
   {
      $objIMReflectionTest = new IMReflection( new InputText() );
      $arrMetodos = $objIMReflectionTest->getMetodos();

      $arrTeste = array(
         'setNome'       => array(
            0 => 'valor'
         ),
         
         'getNome'       => array(),

         'setLabel'      => array(
             0 => 'valor'
         ),
         'getLabel'      => array(),
         'getComponente' => array(),
         'getTipo'       => array(),
         'setValor'      => array(
            0 => 'valor'
         ),
         'getValor'       => array()
      );

      $this->assertEquals( $arrTeste, $arrMetodos );              
   }
}
?>