<?php
require_once( C_PATH_CLASS . 'apps/inputs/iInput.php');

/**
 * Testa a interface iInput
 */
class iInputTest extends PHPUnit_Framework_TestCase
{
   var $objiInput;

   // cria a classe mockada
   public function setUp()
   {
      $this->objiInput = $this->getMock('iInput');
      $this->objiInput    
         ->expects($this->any())     
         ->method('setNome')
         ->will( $this->returnValue(true) );   
   }

   public function testMock()
   {      
      $this->assertTrue( $this->objiInput instanceof iInput );
   }

   public function testsetNome()
   {
      $this->assertEquals( $this->objiInput->setNome(''), true );
   }

   public function testgetNome()
   {
      $this->assertEquals( $this->objiInput->getNome(), null );   
   }

   public function testsetLabel()
   {
      $this->assertEquals( $this->objiInput->setLabel(''), null );   
   }

   public function testgetComponente()
   {
      $this->assertEquals( $this->objiInput->getComponente(), null );   
   }

   public function testgetTipo()
   {
      $this->assertEquals( $this->objiInput->getTipo(), null );   
   }
}
?>