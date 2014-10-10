<?php
namespace test\imclass\imphp;

use imclass\imphp\IMDateTime;

class IMDateTimeTest extends \PHPUnit_Framework_TestCase
{
    private $objIMDateTime;

    public function __construct()
    {
        $this->objIMDateTime = new IMDateTime("");        
    }

    public function testSetDataPtbr()
    {
        $this->objIMDateTime->__construct("");
        $valor = "10/01/2014";

        $retorno = $this->objIMDateTime
            ->setDataPtbr($valor);

        $this->assertEquals(true, $retorno);

        $this->assertEquals(
            $valor,
            $this->objIMDateTime
                ->getDataPtbr()
        );

        // avançado
        $valor2 = "10/01/14";

        $retorno = $this->objIMDateTime
            ->setDataPtbr($valor2);

        $this->assertEquals(true, $retorno);

        $this->assertEquals(
            $valor,
            $this->objIMDateTime
                ->getDataPtbr()
        );


        // incorreto
        $valor3 = "produzir erro";

        $retorno = $this->objIMDateTime
            ->setDataPtbr($valor3);

        $this->assertEquals(false, $retorno);
    }

    public function testgetDataEn()
    {
        $valor = "10/01/2014";
        $this->objIMDateTime
            ->setDataPtbr($valor);

        $this->assertEquals(
            '2014-01-10',
            $this->objIMDateTime->getDataEn()
        );
    }
}