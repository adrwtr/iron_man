<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMConexaoAtributos;

class IMConexaoAtributosTest extends \PHPUnit_Framework_TestCase
{   
   public function testOfgetPDOMysqlString()
   {      
      $obj = new IMConexaoAtributos();

      $obj->setNomeBanco("nome");
      $obj->setLogin("login");
      $obj->setSenha("senha");
      $obj->setBanco("banco");
      $obj->setHost("host");
      $obj->setPorta("porta");
      
      $this->assertEquals( 'mysql:host=host;dbname=banco;', $obj->getPDOMysqlString() );            
   }  
}
?>