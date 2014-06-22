<?php
namespace test\imclass\apps;

use imclass\apps\AppConcreto;

class AppConcretoTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSetDescricao()
    {
        $valor = 'teste';
        
        $objAppConcreto = new AppConcreto();

        $objAppConcreto
            ->setDescricao($valor);

        $this->assertEquals(
            $valor,
            $objAppConcreto
                ->getDescricao()
        );
    }

    public function testExecutar()
    {
        $objAppConcreto = new AppConcreto();
        
        $this->assertEquals(
            $objAppConcreto,
            $objAppConcreto->executar()
        );
    }

    public function testGetSetResultado()
    {
        $objAppConcreto = new AppConcreto();
        $objAppConcreto->setResultado(1);
        
        $this->assertEquals(
            1,
            $objAppConcreto->getResultado()
        );
    }

    public function testGetResultadoOutput()
    {
        $objAppConcreto = new AppConcreto();
        
        $this->assertEquals(
            null,
            $objAppConcreto->getResultadoOutput()
        );
    }

    public function testGetObjAppInputs()
    {
        $objAppConcreto = new AppConcreto();
        
        $this->assertEquals(
            'imclass\apps\inputs\AppInputs',
            get_class(
                $objAppConcreto->getObjAppInputs()
            )
        );
    }

    public function testGetObjAppLinks()
    {
        $objAppConcreto = new AppConcreto();

        $this->assertEquals(
            'imclass\apps\link\AppLinks',
            get_class(
                $objAppConcreto->getObjAppLinks()
            )
        );
    }
}