<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\AppInputs;
use imclass\apps\inputs\InputText;

class AppInputsTest extends \PHPUnit_Framework_TestCase
{
    var $objAppInputs;

    public function criaObjetos()
    {
        $this->objAppInputs = new AppInputs();
    }

    public function setCampoTeste()
    {
        $objInputText = new InputText();
        $objInputText->setNome('texto');

        $valor = array(
            0 => $objInputText
        );

        $this->objAppInputs
            ->addInput($objInputText);

        return $valor;
    }

    public function testSetInput()
    {
        $this->criaObjetos();
        $valor = $this->setCampoTeste();
        
        $this->assertEquals(
            $valor,
            $this->objAppInputs
                ->getArrInputs()
        );
    }

    public function testSetInputByKey()
    {
        $this->criaObjetos();
        $valor = $this->setCampoTeste();

        $objInputText = new InputText();
        $objInputText->setNome('texto2');

        $objInputText2 = new InputText();
        $objInputText2->setNome('texto3');

        $valor = array_merge($valor, array(1 => $objInputText2));

        $this->objAppInputs
            ->addInput($objInputText);

        $this->objAppInputs
            ->setInputByKey($objInputText2, 1);

        $this->assertEquals(
            $valor,
            $this->objAppInputs
                ->getArrInputs()
        );
    }

    public function testSetInputValor()
    {
        $this->criaObjetos();

        $valor = array(
            'nome 1' => 'valor 1',
            'nome 2' => 'valor 2'
        );

        $this->objAppInputs
            ->setInputValor('nome 1', 'valor 1');

        $this->objAppInputs
            ->setInputValor('nome 2', 'valor 2');

        $this->assertEquals(
            'valor 1',
            $this->objAppInputs
                ->getInputValor('nome 1')
        );

        $this->assertEquals(
            'valor 2',
            $this->objAppInputs
                ->getInputValor('nome 2')
        );
    }

    public function testHasInputValor()
    {
        $this->criaObjetos();

        $this->objAppInputs
            ->setInputValor('nome 1', 'valor 1');

        $this->assertTrue(
            $this->objAppInputs
                ->hasInputValor('nome 1')
        );
    }

    public function testGetInputKeyByName()
    {
        $this->criaObjetos();
        $this->setCampoTeste();

        $this->assertEquals(
            0,
            $this->objAppInputs
                ->getInputKeyByName('texto')
        );

        $this->assertEquals(
            null,
            $this->objAppInputs
                ->getInputKeyByName('texto_nao_existe')
        );
    }
}