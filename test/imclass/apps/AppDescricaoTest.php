<?php
namespace test\imclass\apps;

use imclass\apps\AppDescricao;

class AppDescricaoTest extends \PHPUnit_Framework_TestCase
{
    var $objAppDescricao;

    function __construct()
    {
        $this->objAppDescricao = new AppDescricao();
    }


    public function testsetClass()
    {
        $valor = 'NomeClass';
        $this->objAppDescricao->setClass($valor);
        $this->assertEquals($this->objAppDescricao->getClass(), $valor);
    }

    public function testsetPath()
    {
        $valor = 'c:\\teste\\';
        $this->objAppDescricao->setPath($valor);
        $this->assertEquals($this->objAppDescricao->getPath(), $valor);
    }

    public function testAppPath()
    {
        $valor = 'NomeClass';
        $this->objAppDescricao->setClass($valor);

        $valor = 'c:\\teste\\';
        $this->objAppDescricao->setPath($valor);

        $this->assertEquals($this->objAppDescricao->AppPath(), 'c:\\teste\\NomeClass');
    }
}

?>