<?php
namespace test\imclass\entidades\internos\execucoes;

use imclass\entidades\internos\execucoes\IMExecucoes;
use imclass\entidades\internos\execucoes\IMExecucoesParametros;


class IMExecucoesTest extends \PHPUnit_Framework_TestCase
{      
   public function testSettersGetters()
   {
      $objIMExecucoes = new IMExecucoes();
      $objIMExecucoes->setCdExecucao(1);
      $objIMExecucoes->setDsNomeClasse('2');
      $objIMExecucoes->setDsPathClasse('3');
      $objIMExecucoes->setDtExecucao('4');
      $objIMExecucoes->addExecucaoParametro( new IMExecucoesParametros() );
      

      $this->assertEquals( 1, $objIMExecucoes->getCdExecucao() );
      $this->assertEquals( 2, $objIMExecucoes->getDsNomeClasse() );
      $this->assertEquals( 3, $objIMExecucoes->getDsPathClasse() );
      $this->assertEquals( 4, $objIMExecucoes->getDtExecucao() );      
   }
}
?>