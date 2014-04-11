<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMTabela;

class IMTabelaTest extends \PHPUnit_Framework_TestCase
{  
   private $obj;

   public function __construct()
   {  
      $this->objIMTabela = new IMTabela();
   }

   public function testConstruct()
   {
      $this->objIMTabela->__construct();
      $this->assertEquals( $this->objIMTabela->getNome(), '' ); 
      $this->assertEquals( $this->objIMTabela->getColunas(), array() ); 
   }

   public function testGetNome()
   {
      $this->objIMTabela->__construct();
      $this->objIMTabela->setNome('teste');
      $this->assertEquals( $this->objIMTabela->getNome(), 'teste' );   
   }

   public function testGetColunas()
   {
      $this->objIMTabela->__construct();
      $this->objIMTabela->setColunas( array( 'valor' ) );
      $this->assertEquals( $this->objIMTabela->getColunas(), array( 'valor' ) );   
   }
}
?>