<?php
namespace test\imclass\apps;

use imclass\apps\AppsDisponiveis;
use imclass\apps\AppDescricao;

class AppsDisponiveisTest extends \PHPUnit_Framework_TestCase
{
   var $objAppsDisponiveis;

   function __construct()
   {
      $this->objAppsDisponiveis = new AppsDisponiveis();
   }

   public function dadosParaTeste3()
   {
      return array( 
            array( 'aaa', 'bbb' )
         );
   }

   /**
    * @dataProvider dadosParaTeste3
    */
   public function testsetNewApp( $nome='', $path='' )
   {      
      $this->objAppsDisponiveis->setNewApp( $nome, $path );
      $this->assertEquals( is_a( $this->objAppsDisponiveis->getAppByName( $nome ), 'imclass\apps\AppDescricao' ), true  );   
   }

   /**
    * @dataProvider dadosParaTeste3
    */
   public function testgetAllApps( $nome='', $path='' )
   {    
      $this->objAppsDisponiveis->setNewApp( $nome, $path );
      $arr = $this->objAppsDisponiveis->getAllApps();

      $this->assertEquals( is_array($arr), true );   
      $this->assertEquals( count($arr), 1 );   
   }
}
?>