<?php
namespace test\imclass\conversores\imarray;

use imclass\conversores\IMArrayToHTMLTable;
use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

class MOCKIMArrayToHTMLTable extends \PHPUnit_Framework_TestCase
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
    * Tabela horizontal 3 linhas resultado
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
}
?>