<?php
namespace test\imclass\banco_dados\sql_parser;

use imclass\banco_dados\sql_parser\IMSqlParserInsert;

class IMSqlParserInsertTest extends \PHPUnit_Framework_TestCase
{
   var $objIMSqlParserInsert;

   function __construct()
   {
      $this->objIMSqlParserInsert = new IMSqlParserInsert();
   }

   public function testgetStrInsert()
   {
      $this->assertEquals( $this->objIMSqlParserInsert->getStrInsert(), 'INSERT INTO' ); 
   }

   public function testgetStrValue()
   {
      $this->assertEquals( $this->objIMSqlParserInsert->getStrValue(), 'VALUES' ); 
   }


   public function testgetStrSqlOriginal()
   {
      $valor = "teste";
      $this->objIMSqlParserInsert->setStrSqlOriginal( $valor );
      $this->assertEquals( $this->objIMSqlParserInsert->getStrSqlOriginal(), $valor );   
   }

   public function testgetStrTableName()
   {
      $valor = "teste";
      $this->objIMSqlParserInsert->setStrTableName( $valor );
      $this->assertEquals( $this->objIMSqlParserInsert->getStrTableName(), $valor );   
   }

   public function testgetHasCampos()
   {
      $valor = true;
      $this->objIMSqlParserInsert->setHasCampos( $valor );
      $this->assertEquals( $this->objIMSqlParserInsert->getHasCampos(), $valor );   
   }

   public function testgetArrCampos()
   {
      $valor = array(
         'campo' => 'valor'
      );

      $this->objIMSqlParserInsert->setArrCampos( $valor );
      $this->assertEquals( $this->objIMSqlParserInsert->getArrCampos(), $valor );   
   }

   public function testgetArrValores()
   {
      $valor = array(
         'campo' => 'valor'
      );

      $this->objIMSqlParserInsert->setArrValores( $valor );
      $this->assertEquals( $this->objIMSqlParserInsert->getArrValores(), $valor );   
   }   

   public function testgetTabela()
   {
      $str1 = "insert into tabela ( valores ) values ( a );";
      $this->assertEquals( $this->objIMSqlParserInsert->getTabela($str1), 'tabela' );   

      $str1 = "insert into tabela2 values ( a );";
      $this->assertEquals( $this->objIMSqlParserInsert->getTabela($str1), 'tabela2' );   
   }

   public function testgetCampos()
   {
      $str1 = "insert into tabela ( campo1, campo2 ) values ( a );";
      $arrCampos1 = array( 'campo1', 'campo2' );

      $this->objIMSqlParserInsert->getTabela( $str1 );
      $this->assertEquals( $this->objIMSqlParserInsert->getCampos( $str1 ), $arrCampos1 );   

      $str2 = "insert into tabela ( campo1 ) values ( a );";
      $arrCampos2 = array( 'campo1' );

      $this->objIMSqlParserInsert->getTabela( $str2 );
      $this->assertEquals( $this->objIMSqlParserInsert->getCampos( $str2 ), $arrCampos2 );   

      // false test
      $str3 = "insert into tabela values ( a );";
      $this->objIMSqlParserInsert->getTabela( $str3 );
      $this->assertEquals( $this->objIMSqlParserInsert->getCampos( $str3 ), false );   
      
   }

   public function testgetValores()
   {
      $str1 = "insert into tabela ( campo1, campo2 ) values ( valorA, valorB );";
      $arrValores = array( 'valorA', 'valorB' );

      $this->assertEquals( $this->objIMSqlParserInsert->getValores( $str1 ), $arrValores );   

      $str2 = "insert into tabela ( campo1 ) values ( ValorA );";
      $arrValores = array( 'campo1' );

      $this->objIMSqlParserInsert->getTabela( $str2 );
      $this->assertEquals( $this->objIMSqlParserInsert->getCampos( $str2 ), $arrValores );   
   }   

   public function testparse()
   {
      // sem insert
      $str1 = 'insert into tabela ( campo1A, campo2B ) values ( valorA1, valorB2 );';
      $arrCampos  = array( 'CAMPO1A', 'CAMPO2B' );
      $arrValores = array( 'VALORA1', 'VALORB2' );
      $this->objIMSqlParserInsert->parse( $str1 );

      $this->assertEquals( $this->objIMSqlParserInsert->getArrCampos(), $arrCampos );   
      $this->assertEquals( $this->objIMSqlParserInsert->getArrValores(), $arrValores );  

      // false
      $str1 = 'update tabela set valor=A';      
      $this->assertEquals( $this->objIMSqlParserInsert->parse( $str1 ), $false );  
   }

   public function testmergeArray()
   {
      $str1 = 'insert into tabela ( campo1A, campo2B ) values ( valorA1, valorB2 );';
      
      $arr1 = array( 
         'CAMPO1A' => 'VALORA1',
         'CAMPO2B' => 'VALORB2'
      );

      $str2 = 'insert into tabela values ( valorA1, valorB2 );';
      $arrValores = array( 'VALORA1', 'VALORB2' );

      $this->objIMSqlParserInsert->parse( $str1 );
      $this->assertEquals( $this->objIMSqlParserInsert->mergeArray(), $arr1 );  


      $this->objIMSqlParserInsert->parse( $str2 );
      $this->assertEquals( $this->objIMSqlParserInsert->mergeArray(), $arrValores );  
   }
}
?>