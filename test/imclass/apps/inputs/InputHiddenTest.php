<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\InputHidden;

class InputHiddenTest extends \PHPUnit_Framework_TestCase
{
    var $objInputHiddenTest;

    // cria a classe mockada
    public function setUp()
    {
        $this->objInputHiddenTest = new InputHidden();
    }

    public function dadosParaTeste()
    {
        return array( array( 'campo_texto' ) );
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testgetComponente($nome)
    {
        $this->objInputHiddenTest->setLabel($nome);
        $this->objInputHiddenTest->setNome($nome);
        $this->objInputHiddenTest->setValor($nome);

        $valor = '<input type="hidden" class="form-control" 
name="' . $nome . '" placeholder="" 
value="' . $nome . '" />';

        $this->assertEquals(
            $this->objInputHiddenTest
                ->getComponente(),
            $valor
        );
    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objInputHiddenTest->getTipo(),
            'InputHidden'
        );
    }
}