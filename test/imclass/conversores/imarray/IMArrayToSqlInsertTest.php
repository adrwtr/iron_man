<?php
namespace test\imclass\conversores;

use imclass\conversores\imarray\IMArrayToSqlInsert;


class IMArrayToSqlInsertTest extends \PHPUnit_Framework_TestCase
{      

   public function testconvertToInsert()
   {
      $objIMArrayToSqlInsert = new IMArrayToSqlInsert();

      $sql = $objIMArrayToSqlInsert->convertToInsert( 
         'nome_tabela', 
         $this->mockArray()         
      ); 

      $sql = 'insert into nome_tabela ( campo1, campo2 ) values ( valor A, valor B );';

      $this->assertEquals(         
         $sql,
         $sql
      );
   }

   public function mockArray()
   {
      return array(
         'campo1' => 'valor A',
         'campo2' => 'valor B'
      );
   }
   

}
?>