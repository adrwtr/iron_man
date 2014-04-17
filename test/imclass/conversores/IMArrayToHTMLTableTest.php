<?php
namespace test\imclass\conversores;

use imclass\conversores\IMArrayToHTMLTable;
use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

class IMArrayToHTMLTableTest extends \PHPUnit_Framework_TestCase
{  

   public function mockTableHorizontal()
   {
      $objIMHtmlTable = new IMHtmlTable();
      
      // linha principal
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 1');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );
            
      $objIMHtmlTable->addTr( $objIMHtmlTr );

      // valores
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 1');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );
            
      $objIMHtmlTable->addTr( $objIMHtmlTr );

      return $objIMHtmlTable->getHTML();
   }

   public function mockTableVertical()
   {
      $objIMHtmlTable = new IMHtmlTable();
      
      // linha principal
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 1');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 1');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTable->addTr( $objIMHtmlTr );


      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );
            
      $objIMHtmlTable->addTr( $objIMHtmlTr );

      return $objIMHtmlTable->getHTML();
   }

   public function getArrayTable()
   {
      return array(
         'Coluna 1' => 'Valor 1',
         'Coluna 2' => 'Valor 2'   
      );
   }

   public function testconvertTabelaHorizontal()
   {
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

      $this->assertEquals( 
         $this->mockTableHorizontal(), 
         $objIMArrayToHTMLTable->convertTabelaHorizontal( $this->getArrayTable() ) 
      );
   }

   public function testconvertTabelaVertical()
   {
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

      $this->assertEquals( 
         $this->mockTableVertical(), 
         $objIMArrayToHTMLTable->convertTabelaVertical( $this->getArrayTable() ) 
      );
   }
}
?>