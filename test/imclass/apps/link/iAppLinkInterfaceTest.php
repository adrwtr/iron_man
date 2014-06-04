<?php
namespace test\imclass\apps\link;

use imclass\apps\link\iAppLinkInterface;

class iAppLinkInterfaceTest extends \PHPUnit_Framework_TestCase
{
   var $objiAppLinkInterface;

   // cria a classe mockada
   public function setUp()
   {
      $this->objiAppLinkInterface = $this->
         getMock('imclass\apps\link\iAppLinkInterface');

      $this->objiAppLinkInterface    
         ->expects($this->any())     
         ->method('addExecucao')
         ->will( $this->returnValue(true) ); 

      $this->objiAppLinkInterface    
         ->expects($this->any())     
         ->method('getExecucoes')
         ->will( $this->returnValue(array()) );   
   }
   
   public function testInterface()
   {            
      $this->assertEquals( $this->objiAppLinkInterface->addExecucao('valor'), true  );   
      $this->assertEquals( $this->objiAppLinkInterface->getExecucoes(), array()  );         
   }
}
?>