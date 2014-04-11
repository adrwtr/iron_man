<?php
namespace test\imclass\html\table;

use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;


/**
 * Classe que simula uma tr
 */
class IMHtmlTrTest extends \PHPUnit_Framework_TestCase 
{
   
   public function testsetAttr()
   {
      $objIMHtmlTr = new IMHtmlTr();
      $objIMHtmlTr->setAttr('valor');
      
      $this->assertEquals( $objIMHtmlTr->getAttr(), 'valor' );
   }

   public function testsetArrIMHtmlTdList()
   {
      $objIMHtmlTr = new IMHtmlTr();
      $array = array( 0 => 'valor' );

      $objIMHtmlTr->setArrIMHtmlTdList( $array );
      $this->assertEquals( $objIMHtmlTr->getArrIMHtmlTdList(), $array );
   }

   public function testaddTd()
   {
      $objIMHtmlTr = new IMHtmlTr();

      // teste null
      $objIMHtmlTr->addTd();
      $array = array( 0 => new IMHtmlTd() );

      $this->assertEquals( $objIMHtmlTr->getArrIMHtmlTdList(), $array );


      // teste criado
      $obj = new IMHtmlTd();
      $objIMHtmlTr->addTd( $obj );

      $array = array( 
         0 => new IMHtmlTd(),
         1 => $obj
      );

      $this->assertEquals( $objIMHtmlTr->getArrIMHtmlTdList(), $array ); 
   }

   public function testtemColunas()   
   {
      $objIMHtmlTr = new IMHtmlTr();
      $this->assertEquals( $objIMHtmlTr->temColunas(), false );    

      $objIMHtmlTr->addTd();
      $this->assertEquals( $objIMHtmlTr->temColunas(), true );    
   }


   public function testgetHTML()
   {
      $objIMHtmlTr = new IMHtmlTr();
      $atributo = 'atributo';

      $html = "<tr ". $atributo .">\n";
      $html .= "</tr>\n";

      // vazio
      $objIMHtmlTr->setAttr( $atributo );
      $this->assertEquals( $objIMHtmlTr->getHTML(), $html ); 

      // novo teste
      $html = "<tr ". $atributo .">\n";
      $objIMHtmlTd = new IMHtmlTd();
      $html .= $objIMHtmlTd->getHTML();
      $html .= "</tr>\n";

      $objIMHtmlTr->addTd();

      // com 1 td
      $this->assertEquals( $objIMHtmlTr->getHTML(), $html ); 

      // novo teste      
      $html = "<tr ". $atributo .">\n";
      $objIMHtmlTd = new IMHtmlTd();
      $html .= $objIMHtmlTd->getHTML();
      $html .= $objIMHtmlTd->getHTML();
      $html .= "</tr>\n";

      // cuidado: esta adicionando novo na lista (tem 2)
      $objIMHtmlTr->addTd();

      // com 2 td
      $this->assertEquals( $objIMHtmlTr->getHTML(), $html ); 
   }
}