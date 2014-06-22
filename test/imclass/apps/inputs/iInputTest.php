<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\IInput;

class IInputTest extends \PHPUnit_Framework_TestCase
{
    var $objIInput;

    // cria a classe mockada
    public function setUp()
    {
        $this->objIInput = $this->getMock('imclass\apps\inputs\IInput');

        $this->objIInput
            ->expects($this->any())
            ->method('setNome')
            ->will($this->returnValue(true));
    }

    public function testMock()
    {
        $this->assertTrue($this->objIInput instanceof IInput);
    }

    public function testsetNome()
    {
        $this->assertEquals(
            $this->objIInput->setNome(''),
            true
        );
    }

    public function testgetNome()
    {
        $this->assertEquals($this->objIInput->getNome(), null);
    }

    public function testsetLabel()
    {
        $this->assertEquals($this->objIInput->setLabel(''), null);
    }

    public function testgetComponente()
    {
        $this->assertEquals($this->objIInput->getComponente(), null);
    }

    public function testgetTipo()
    {
        $this->assertEquals($this->objIInput->getTipo(), null);
    }

    public function testSetGetValor()
    {
        $this->assertEquals($this->objIInput->setValor(''), null);
        $this->assertEquals($this->objIInput->getValor(''), null);
    }
}