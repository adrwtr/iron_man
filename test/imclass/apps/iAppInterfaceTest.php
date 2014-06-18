<?php
namespace test\imclass\apps;

use imclass\apps\iAppInterface;
use imclass\apps\link\LinkCampo;

class iAppInterfaceTest extends \PHPUnit_Framework_TestCase
{
    var $objiAppInterface;

    // cria a classe mockada
    public function setUp()
    {
        $this->objiAppInterface = $this->getMock('imclass\apps\iAppInterface');

        $this->objiAppInterface
            ->expects($this->any())
            ->method('executar')
            ->will($this->returnValue(true));
    }

    public function testInterface()
    {
        $this->assertEquals($this->objiAppInterface->setDescricao(), null);
        $this->assertEquals($this->objiAppInterface->getDescricao(), null);
        $this->assertEquals($this->objiAppInterface->setInput(''), null);
        $this->assertEquals($this->objiAppInterface->getArrInputs(''), null);
        $this->assertEquals($this->objiAppInterface->setInputValor('', ''), null);
        $this->assertEquals($this->objiAppInterface->getInputValor(''), null);

        $this->assertEquals(
            $this->objiAppInterface
                ->setCamposLinkados(
                    new LinkCampo(null, null, null, null)
                ),
            null
        );

        $this->assertEquals(
            $this->objiAppInterface
                ->setRetornosLinkados(
                    new LinkCampo(null, null, null, null)
                ),
            null
        );

    }

    public function testexecutar()
    {
        $this->assertEquals($this->objiAppInterface->executar(), true);
    }
}

?>