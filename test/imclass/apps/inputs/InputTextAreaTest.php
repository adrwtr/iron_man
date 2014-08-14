<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\InputTextArea;

class InputTextAreaTest extends \PHPUnit_Framework_TestCase
{
    var $objInputTextAreaTest;

    // cria a classe mockada
    public function setUp()
    {
        $this->objInputTextAreaTest = new InputTextArea();
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
        $this->objInputTextAreaTest->setLabel($nome);
        $this->objInputTextAreaTest->setNome($nome);
        $this->objInputTextAreaTest->setValor($nome);

        $valor = '<div class="input-group">
      <span class="input-group-addon">' . $nome . '</span>
      <textarea class="form-control"
         name="' . $nome . '" 
         id="' . $nome . '" cols="80" rows="10">' . $nome . '</textarea>   
      </div><BR />';

        $this->assertEquals(
            $this->objInputTextAreaTest
                ->getComponente(),
            $valor
        );
    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objInputTextAreaTest->getTipo(),
            'InputTextArea'
        );
    }
}