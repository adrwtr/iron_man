<?php
namespace test\imclass\entidades\internos\execucoes;

use imclass\entidades\internos\execucoes\IMTestImMemoriaTemp;


class IMTestImMemoriaTempTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
        $objIMTestImMemoriaTemp = new IMTestImMemoriaTemp();
        $objIMTestImMemoriaTemp->setId(1);
        $objIMTestImMemoriaTemp->setDsDescricao('2');
        $objIMTestImMemoriaTemp->setDsClasse('3');
        $objIMTestImMemoriaTemp->setDsParametros('4');
        $objIMTestImMemoriaTemp->setDtCadastro('5');

        $this->assertEquals(1, $objIMTestImMemoriaTemp->getId());
        $this->assertEquals(2, $objIMTestImMemoriaTemp->getDsDescricao());
        $this->assertEquals(3, $objIMTestImMemoriaTemp->getDsClasse());
        $this->assertEquals(4, $objIMTestImMemoriaTemp->getDsParametros());
        $this->assertEquals(5, $objIMTestImMemoriaTemp->getDtCadastro());
    }
}

?>