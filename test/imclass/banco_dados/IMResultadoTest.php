<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMResultado;

class IMResultadoTest extends \PHPUnit_Framework_TestCase
{   

   public function mockArray()
   {
      return array(
         0 => array(
            'campo1' => 'valor 1',
            'campo2' => 'valor 2'
         ),

         1 => array(
            'campo1' => 'valor 1 A',
            'campo2' => 'valor 2 A'
         )
      );
   }


   public function testgettersetters()
   {      
      $objIMResultado = new IMResultado();      
      $this->assertEquals( array(), $objIMResultado->get() );                  

      $objIMResultado->set( $this->mockArray() );
      $this->assertEquals( $this->mockArray(), $objIMResultado->get() );                  
   }  

   public function testgetArrayCampos()
   {
      $objIMResultado = new IMResultado();  
      $objIMResultado->set( $this->mockArray() );

      $array = array(
         'campo1',
         'campo2'
      );

      $this->assertEquals( $array, $objIMResultado->getArrayCampos() );
   }

   public function testgetValuesFromCampo()
   {
      $objIMResultado = new IMResultado();  
      $objIMResultado->set( $this->mockArray() );

      $array = array(
         'valor 1',
         'valor 1 A'
      );

      $this->assertEquals( 
         $array, 
         $objIMResultado->getValuesFromCampo( 'campo1' ) 
      );      
   }

   public function testgetLinha()
   {
      $objIMResultado = new IMResultado();  
      $objIMResultado->set( $this->mockArray() );

      $array = array(
            'campo1' => 'valor 1',
            'campo2' => 'valor 2'
         );

      $this->assertEquals( 
         $array, 
         $objIMResultado->getLinha( 1 ) 
      ); 


      // teste de nada
      $objIMResultado->set( '' );
      $this->assertEquals( 
         array(), 
         $objIMResultado->getLinha( 1 ) 
      ); 

   }
   
}
?>