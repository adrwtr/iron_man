<?php
require_once( C_PATH_CLASS . 'apps/inputs/InputText.php');

class InputTextTest extends PHPUnit_Framework_TestCase
{
   var $objInputTextTest;

   // cria a classe mockada
   public function setUp()
   {
      $this->objInputTextTest = new InputText();      
   }

   public function dadosParaTeste()
   {
      return array( array( 'nome' ) );
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

      $valor = '
      <div class="input-group">
      <span class="input-group-addon">'. $nome . '</span>
      <input type="text" class="form-control" name="' . $nome . '" placeholder="">
      </div><BR />';


      $this->assertEquals( $this->objInputTextTest->getComponente(), $valor );   
   }

   public function testgetTipo()
   {
      return $this->assertEquals( $this->objInputTextTest->getTipo(), 'InputText' );
   }
}
?>