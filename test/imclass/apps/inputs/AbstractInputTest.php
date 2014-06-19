<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

class AbstractInputTest extends \PHPUnit_Framework_TestCase
{
    var $objAbstractInput;

    /**
     * Cria a classe mockada
     */
    public function setUp()
    {
        $this->objAbstractInput = $this->getMockForAbstractClass('imclass\apps\inputs\AbstractInput');

        $this->objAbstractInput
            ->expects($this->any())
            ->method('getComponente')
            ->will($this->returnValue(true));

        $this->objAbstractInput
            ->expects($this->any())
            ->method('getTipo')
            ->will($this->returnValue(true));
    }

    /**
     * Dados a serem utilizados como test
     * @return array
     */
    public function dadosParaTeste()
    {
        return array( array( 'CAMPO_TESTE' ) );
    }

    /**
     * Teste de mock
     */
    public function testMock()
    {
        $this->assertTrue($this->objAbstractInput instanceof AbstractInput);
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testsetgetNome($nome)
    {
        $this->objAbstractInput->setNome($nome);
        $this->assertEquals($this->objAbstractInput->getNome(), $nome);
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testsetgetLabel($nome)
    {
        $this->objAbstractInput->setLabel($nome);
        $this->assertEquals($this->objAbstractInput->getLabel(), $nome);
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testsetgetValor($nome)
    {
        $this->objAbstractInput->setValor($nome);
        $this->assertEquals($this->objAbstractInput->getValor(), $nome);
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testgetComponente($nome)
    {
        $this->assertEquals(
            $this->objAbstractInput->getComponente(),
            true
        );
    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objAbstractInput->getTipo(),
            true
        );
    }
}