<?php
namespace test\imclass\entidades\internos\execucoes;

use imclass\entidades\internos\execucoes\IMExecucoesParametros;


class IMExecucoesParametrosTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
        $objIMExecucoesParametros = new IMExecucoesParametros();
        $objIMExecucoesParametros->setCdParametro(1);
        $objIMExecucoesParametros->setCdExecucao(2);
        $objIMExecucoesParametros->setDsNome('3');
        $objIMExecucoesParametros->setDsValor('4');


        $this->assertEquals(1, $objIMExecucoesParametros->getCdParametro());
        $this->assertEquals(2, $objIMExecucoesParametros->getCdExecucao());
        $this->assertEquals(3, $objIMExecucoesParametros->getDsNome());
        $this->assertEquals(4, $objIMExecucoesParametros->getDsValor());
    }
}