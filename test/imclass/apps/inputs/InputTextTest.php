<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\iInput;
use imclass\apps\inputs\InputText;

class InputTextTest extends \PHPUnit_Framework_TestCase
{
   var $objInputTextTest;

   // cria a classe mockada
   public function setUp()
   {
      $this->objInputTextTest = new InputText();      
   }

   public function dadosParaTeste()
   {
      return array( array( 'COISA' ) );
   }

   /**
    * @dataProvider dadosParaTeste
    */
   public function testsetNome( $nome )
   {      
      $this->objInputTextTest->setNome( $nome );

      $this->assertEquals( $this->objInputTextTest->getNome(), $nome );   
   }

   /**
    * @depends testsetNome
    * @dataProvider dadosParaTeste
    */
   public function testgetNome( $nome ) 
   {      
      $this->objInputTextTest->setNome( $nome );
      $this->assertEquals( $this->objInputTextTest->getNome(), $nome );   
   }

   /**
    * @depends testsetNome
    * @dataProvider dadosParaTeste
    */
   public function testsetLabel( $nome )
   {
      $this->objInputTextTest->setLabel( $nome );

      $this->assertEquals( $this->objInputTextTest->getLabel(), $nome );   
   }

   /**
    * @depends testsetNome
    * @dataProvider dadosParaTeste
    */
   public function testgetLabel( $nome )
   {
      $this->objInputTextTest->setLabel( $nome );
      $this->assertEquals( $this->objInputTextTest->getLabel(), $nome );   
   }

   /**
    * @depends testgetNome
    * @depends testgetLabel
    * @dataProvider dadosParaTeste
    */
   public function testgetComponente( $nome )
   {
      $this->objInputTextTest->setLabel( $nome );
      $this->objInputTextTest->setNome( $nome );
      $this->objInputTextTest->setValor( $nome );

      $valor = '
      <div class="input-group">
      <span class="input-group-addon">'. $nome . '</span>
      <input type="text" class="form-control" 
         name="' . $nome . '" placeholder="" 
         value="'. $nome .'">
      </div><BR />';
      
      $this->assertEquals( $this->objInputTextTest->getComponente(), $valor );   
   }

   public function testgetTipo()
   {
      return $this->assertEquals( $this->objInputTextTest->getTipo(), 'InputText' );
   }
}
?>