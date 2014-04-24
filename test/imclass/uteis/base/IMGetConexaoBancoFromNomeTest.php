<?php
namespace test\imclass\uteis\base;

use imclass\imphp\IMPDOStatement;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;

class IMPDOStatementTest extends \PHPUnit_Framework_TestCase
{  

   public function testConstruct()
   {
      /*
      $objIMConexaoBancoDados = $this->getConexaoParaTesteOK();

      $objIMConexaoBancoDados->executa("truncate table test_im_memoria_temp");
      $objIMConexaoBancoDados->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
      
      $result = $objIMConexaoBancoDados->query("select * from test_im_memoria_temp limit 1");      

      $objIMPDOStatement = new IMPDOStatement( $result );
      */
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