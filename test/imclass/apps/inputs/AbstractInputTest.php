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
        $this->objAbstractInput = $this->getMock('imclass\apps\inputs\AbstractInput');

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
        $this->objInputTextTest->setNome($nome);
        $this->assertEquals($this->objInputTextTest->getNome(), $nome);
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testsetgetLabel($nome)
    {
        $this->objInputTextTest->setLabel($nome);
        $this->assertEquals($this->objInputTextTest->getLabel(), $nome);
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testgetComponente($nome)
    {
        $this->assertEquals(
            $this->objInputTextTest->getComponente(), 
            true
        );
    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objInputTextTest->getTipo(), 
            true
        );
    }
}