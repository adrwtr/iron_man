<?php
namespace test\imclass\conversores;

use imclass\conversores\IMArrayToHTMLTable;
use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

class IMArrayToHTMLTableTest extends \PHPUnit_Framework_TestCase
{  

   /**
    * Tabela horizontal 2 linhas
    */
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

   /**
    * Tabela horizontal linha topo e 2 linhas resultado
    * @return [type] [description]
    */
   public function mockTableHorizontalBidimensional()
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

      // valores
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 1 A');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 2 B');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );
            
      $objIMHtmlTable->addTr( $objIMHtmlTr );

      return $objIMHtmlTable->getHTML();
   }

   /**
    * Tabela horizontal Linha topo apenas
    * @return [type] [description]
    */
   public function mockTableHorizontalTopo()
   {  
      // linha principal
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 1');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );
    
      return $objIMHtmlTr->getHTML();
   }   

   /**
    * Tabela horizontal valores da linha 2
    * @return [type] [description]
    */
   public function mockTableHorizontalValoresLinha2()
   {  
      // linha principal
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 1 A');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 2 B');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );
    
      return $objIMHtmlTr->getHTML();
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

   public function mockTableVerticalBidimensional()
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

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 1 A');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTable->addTr( $objIMHtmlTr );


      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Coluna 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 2');      
      $objIMHtmlTr->addTd( $objIMHtmlTd );

      $objIMHtmlTd = new IMHtmlTd();
      $objIMHtmlTd->setValor('Valor 2 B');      
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

   public function getArrayTableBidimensional()
   {
      return array(
         0 => array(
            'Coluna 1' => 'Valor 1',
            'Coluna 2' => 'Valor 2'   
         ),

         1 => array(
            'Coluna 1' => 'Valor 1 A',
            'Coluna 2' => 'Valor 2 B'   
         )
      );
   }

   public function testgetLinhaTopo()
   {
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

      $this->assertEquals( 
         $this->mockTableHorizontalTopo(), 
         $objIMArrayToHTMLTable->getLinhaTopo( $this->getArrayTable() )
            ->getHTML() 
      );
   }

   public function testgetLinhaValor()
   {   
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();      

      $this->assertEquals( 
         $this->mockTableHorizontalValoresLinha2(), 
         $objIMArrayToHTMLTable->getLinhaValor(
            $this->getArrayTableBidimensional(),
            1
         )->getHTML()
      );            
   }


   public function testconvertTabelaHorizontal()
   {
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

      $this->assertEquals( 
         $this->mockTableHorizontal(), 
         $objIMArrayToHTMLTable->convertTabelaHorizontal( $this->getArrayTable() )
            ->getHTML() 
      );
      
      $this->assertEquals( 
         $this->mockTableHorizontalBidimensional(), 
         $objIMArrayToHTMLTable->convertTabelaHorizontal( $this->getArrayTableBidimensional() ) 
            ->getHTML()
      );
      
   }






   public function testconvertTabelaVertical()
   {
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

      $this->assertEquals( 
         $this->mockTableVertical(), 
         $objIMArrayToHTMLTable->convertTabelaVertical( $this->getArrayTable() ) 
            ->getHTML()
      );


      vl($this->mockTableVerticalBidimensional());

      vl( $objIMArrayToHTMLTable->convertTabelaVertical( $this->getArrayTableBidimensional() ) 
            ->getHTML() );
      
      $this->assertEquals( 
         $this->mockTableVerticalBidimensional(), 
         $objIMArrayToHTMLTable->convertTabelaVertical( $this->getArrayTableBidimensional() ) 
            ->getHTML()
      );
      
   }



   /* n?o pode testar metodo privado
   public function testverificaBidimensional()
   {      
      $this->assertFalse( 
         IMArrayToHTMLTable::verificaBidimensional(
            $this->getArrayTable()
         )
      );

      $this->assertTrue( 
         IMArrayToHTMLTable::verificaBidimensional(
            $this->getArrayTableBidimensional()
         )
      );
   }
   */

   
}
?>