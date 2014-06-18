<?php
namespace test\imclass\apps;

use imclass\apps\AppConcreto;

class AppConcretoTest extends \PHPUnit_Framework_TestCase
{
    var $objAppConcreto;

    function __construct()
    {
        $this->objAppConcreto = new AppConcreto();
    }


    public function testsetDescricao()
    {
        $valor = 'teste';
        $this->objAppConcreto->setDescricao( $valor );
        $this->assertEquals( $this->objAppConcreto->getDescricao(), $valor );
    }

    public function testsetInput()
    {
        $valor = array(
            0 => 'teste 1',
            1 => 'teste 2'
        );

        $this->objAppConcreto->setInput( 'teste 1' );
        $this->objAppConcreto->setInput( 'teste 2' );

        $this->assertEquals( $this->objAppConcreto->getArrInputs(), $valor );
    }

    public function testsetInputValor()
    {
        $valor = array(
            'nome 1' => 'valor 1',
            'nome 2' => 'valor 2'
        );

        $this->objAppConcreto->setInputValor( 'nome 1', 'valor 1' );
        $this->objAppConcreto->setInputValor( 'nome 2', 'valor 2' );

        $this->assertEquals( $this->objAppConcreto->getInputValor( 'nome 1' ), 'valor 1' );
        $this->assertEquals( $this->objAppConcreto->getInputValor( 'nome 2' ), 'valor 2' );
    }

    public function testexecutar()
    {
        // $this->assertEquals( $this->objAppConcreto->executar(), null );
    }
}

?>