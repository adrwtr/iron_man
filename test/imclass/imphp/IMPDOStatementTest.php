<?php
namespace test\imclass\imphp;

use imclass\imphp\IMPDOStatement;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;
use info_data\base\ConexaoLocal;

class IMPDOStatementTest extends \PHPUnit_Framework_TestCase
{  

   public function testConstruct()
   {
      $objConexaoLocal = new ConexaoLocal();
      $objIMConexaoBancoDados = $objConexaoLocal->getConexao();
      $result  = $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");
      $result  = $objIMConexaoBancoDados->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
      $result  = $objIMConexaoBancoDados->query("select * from test_im_memoria_temp limit 1");      
      
      $this->assertTrue( is_array( $result->getArrValores() ) );

      $result  = $objIMConexaoBancoDados->query("select aaaaaaa from test_im_memoria_tempAAA limit 1");      
      // vl($result->ehValido());
      $this->assertFalse( $result->ehValido() );

   }




   /**
    * Mock para criar a conexao
    */
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
}
?>