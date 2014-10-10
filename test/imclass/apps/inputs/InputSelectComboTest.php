<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\InputSelectCombo;

class InputSelectComboTest extends \PHPUnit_Framework_TestCase
{
    var $objInputSelectComboTest;

    // cria a classe mockada
    public function setUp()
    {
        $this->objInputSelectComboTest = new InputSelectCombo();
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
        $this->objInputSelectComboTest->setLabel($nome);
        $this->objInputSelectComboTest->setNome($nome);
        $this->objInputSelectComboTest->setValor($nome);

        $valor = '<div class="input-group">
<span class="input-group-addon">' . $this->objInputSelectComboTest->getLabel() . '</span>

<div class="list-group">
<select name="'. $this->objInputSelectComboTest->getNome() .'">
<option value="">Selecione</option>
</select></div></div>';

        $this->assertEquals(
            $valor,
            $this->objInputSelectComboTest
                ->getComponente()
        );

        $this->objInputSelectComboTest->addValoresCampo(
            $nome, 
            $nome
        );

        $valor = '<div class="input-group">
<span class="input-group-addon">' . $this->objInputSelectComboTest->getLabel() . '</span>

<div class="list-group">
<select name="'. $this->objInputSelectComboTest->getNome() .'">
<option value="">Selecione</option>
<option value="'.$nome.'" selected="selected">'.$nome.'</option></select></div></div>';

        $this->assertEquals(
            $valor,
            $this->objInputSelectComboTest
                ->getComponente()
        );

    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objInputSelectComboTest->getTipo(),
            'InputSelectCombo'
        );
    }
}