<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;

class IMConexaoBancoDadosTest extends \PHPUnit_Framework_TestCase
{  

   public function testconectarMysql()
   {
      $objIMConexaoBancoDados = $this->getConexaoParaTesteOK();
      
      $conectou = $objIMConexaoBancoDados->conectarMysql( 
         $this->getAtributosOK() 
      );            
      $this->assertTrue( $conectou );   
      $this->assertTrue( $objIMConexaoBancoDados->getIsConnected() );


      // sem conexao
      $conectou = $objIMConexaoBancoDados->conectarMysql( null );
      $this->assertFalse( $conectou );   
   }  

   public function testconectarMysqlExpection()
   {
      $objIMConexaoBancoDados = $this->getConexaoParaTesteFalho();
      $conectou = $objIMConexaoBancoDados->conectarMysql( $objIMConexaoAtributos );

      $this->assertFalse( $conectou );   
   }  


   public function testquery()
   {
      $objIMConexaoBancoDados = $this->getConexaoParaTesteOK();

      $result  = $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");
      $result  = $objIMConexaoBancoDados->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
      $result  = $objIMConexaoBancoDados->query("select * from test_im_memoria_temp limit 1");      
      
      $this->assertEquals( get_class($result), 'imclass\imphp\IMPDOStatement');

      $objIMConexaoBancoDados = $this->getConexaoParaTesteFalho();
      $result  = $objIMConexaoBancoDados->query("select * from test_im_memoria_temp limit 1");      
      $this->assertFalse( $result );
   }
   

   public function testOfexecuta()
   {
      $objIMConexaoBancoDados = $this->getConexaoParaTesteOK();

      $result  = $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");
      
      $result  = $objIMConexaoBancoDados->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
      $result  = $objIMConexaoBancoDados->executa("delete from test_im_memoria_temp where  id = 1");
      
      $this->assertEquals( 1, $result );

      $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");

      $objIMConexaoBancoDados = $this->getConexaoParaTesteFalho();
      $result = $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");
      $this->assertEquals( 0, $result );
   }


   public function testOfgetLastInsertId()
   {
      $objIMConexaoBancoDados = $this->getConexaoParaTesteOK();

      $result  = $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");      
      $result  = $objIMConexaoBancoDados->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
            
      $this->assertEquals( 1, $objIMConexaoBancoDados->getLastInsertId() );

      $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");      
   }

   public function getAtributosOK()
   {
      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("unimestre");
      $objIMConexaoAtributos->setLogin("moodle");
      $objIMConexaoAtributos->setSenha("moodle");
      $objIMConexaoAtributos->setBanco("adriano");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");

      return $objIMConexaoAtributos;
   }

   public function getConexaoParaTesteOK()
   {
      $objIMConexaoBancoDados = new IMConexaoBancoDados();
      $conectou = $objIMConexaoBancoDados->conectarMysql( 
         $this->getAtributosOK() 
      ); 

      return $objIMConexaoBancoDados;
   }


   public function getAtributosFalho()
   {
      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("unimestre");
      $objIMConexaoAtributos->setLogin("aaa");
      $objIMConexaoAtributos->setSenha("aaa");
      $objIMConexaoAtributos->setBanco("adriano");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");

      return $objIMConexaoAtributos;
   }

   /**
    * @expectedException \PDOException
    * @expectedExceptionCode 1045
    */
   public function getConexaoParaTesteFalho()
   {
      $objIMConexaoBancoDados = new IMConexaoBancoDados();

      $conectou = $objIMConexaoBancoDados->conectarMysql( 
         $this->getAtributosFalho() 
      ); 

      return $objIMConexaoBancoDados;
   }

   
}
?>