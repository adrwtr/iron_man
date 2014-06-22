<?php
namespace test\imclass\apps;

use imclass\apps\AppConcreto;

class AppConcretoTest extends \PHPUnit_Framework_TestCase
{
    var $objAppConcreto;

    public function __construct()
    {
        $this->objAppConcreto = new AppConcreto();
    }


    public function testsetDescricao()
    {
        $valor = 'teste';
        $this->objAppConcreto->setDescricao($valor);
        $this->assertEquals($this->objAppConcreto->getDescricao(), $valor);
    }

    

    public function testexecutar()
    {
        // $this->assertEquals( $this->objAppConcreto->executar(), null );
    }
}