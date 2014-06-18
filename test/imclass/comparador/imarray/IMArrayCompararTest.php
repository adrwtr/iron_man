<?php
namespace test\imclass\comparador\imarray;

use imclass\comparador\imarray\IMArrayComparar;

class IMArrayCompararTest extends \PHPUnit_Framework_TestCase
{

    public function mockArrayA()
    {
        return array(
            'campoA' => 'valor 1',
            'campoB' => 'valor 2'
        );
    }

    public function mockArrayB()
    {
        return array(
            'campoA' => 'valor 1',
            'campoB' => 'valor 3 xxx'
        );
    }


    public function mockIgual()
    {
        return array(
            0 => array(
                'coluna' => 'campoA',
                'linha' => 'valor 1'
            )
        );
    }

    public function mockDiff()
    {
        return array(
            0 => array(
                'coluna' => 'campoB',
                'linha' => 'valor 3 xxx'
            )
        );
    }

    public function testcomparar()
    {
        $objIMArrayComparar = new IMArrayComparar();

        // compara A com B
        $arrResultado = $objIMArrayComparar->comparar(
            $this->mockArrayA(),
            $this->mockArrayB()
        );

        $this->assertEquals(
            $this->mockIgual(),
            $arrResultado[ 'arrIguais' ]
        );

        $this->assertEquals(
            $this->mockDiff(),
            $arrResultado[ 'arrDiferentes' ]
        );

    }
}