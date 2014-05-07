<?php
namespace test\imclass\conversores\imarray;

use imclass\conversores\imarray\IMArrayToHTMLTable;
use test\imclass\conversores\imarray\MOCKIMArrayToHTMLTable;


class IMArrayToHTMLTableTest extends \PHPUnit_Framework_TestCase
{     
   public function testverificaBidimensional()
   {
      $objIMArrayToHTMLTable     = new IMArrayToHTMLTable();
      $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

      $this->assertFalse( 
        
         $objIMArrayToHTMLTable->verificaBidimensional( 
            $objMOCKIMArrayToHTMLTable->getArrayTable() 
         )
      );

      $this->assertTrue( 
        
         $objIMArrayToHTMLTable->verificaBidimensional( 
            $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional() 
         )
      );
   }

   public function testconvertTabelaHorizontal()
   {
      $objIMArrayToHTMLTable     = new IMArrayToHTMLTable();
      $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

      // simples
      $this->assertEquals( 
         $objMOCKIMArrayToHTMLTable->mockTableHorizontal(), 

         $objIMArrayToHTMLTable->convertTabelaHorizontal( 
            $objMOCKIMArrayToHTMLTable->getArrayTable() 
         )->getHTML() 
      );

      // bi      
      $this->assertEquals( 
         $objMOCKIMArrayToHTMLTable->mockTableHorizontalBidimensional(), 
         
         $objIMArrayToHTMLTable->convertTabelaHorizontal( 
            $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional() 
         )->getHTML()
      );

   }

   public function testconvertTabelaVertical()
   {
      $objIMArrayToHTMLTable     = new IMArrayToHTMLTable();
      $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

      // simples
      $this->assertEquals( 
         $objMOCKIMArrayToHTMLTable->mockTableVertical(), 

         $objIMArrayToHTMLTable->convertTabelaVertical( 
            $objMOCKIMArrayToHTMLTable->getArrayTable() 
         )->getHTML() 
      );

      // bi
      $this->assertEquals( 
         $objMOCKIMArrayToHTMLTable->mockTableVerticalBidimensional(), 
         
         $objIMArrayToHTMLTable->convertTabelaVertical( 
            $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional() 
            )->getHTML()
      );   
   }
}
?>