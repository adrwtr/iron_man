<?php
namespace test\imclass\apps;

use imclass\apps\IAppInterface;
use imclass\apps\link\LinkCampo;

class IAppInterfaceTest extends \PHPUnit_Framework_TestCase
{
    var $objIAppInterface;

    // cria a classe mockada
    public function setUp()
    {
        $this->objIAppInterface = $this->getMock('imclass\apps\IAppInterface');

        $this->objIAppInterface
            ->expects($this->any())
            ->method('executar')
            ->will($this->returnValue(true));
    }

    public function testInterface()
    {
        $this->assertEquals($this->objIAppInterface->setDescricao(), null);
        $this->assertEquals($this->objIAppInterface->getDescricao(), null);
    }

    public function testexecutar()
    {
        $this->assertEquals($this->objIAppInterface->executar(), true);
    }
}