<?php
namespace test\imclass\conversores;

use imclass\conversores\imarray\IMArrayBiToHTMLTable;
use test\imclass\conversores\imarray\MOCKIMArrayToHTMLTable;


class IMArrayBiToHTMLTableTest extends \PHPUnit_Framework_TestCase
{

    public function testgetLinhaTopoHorizontal()
    {
        $objIMArrayBiToHTMLTable = new IMArrayBiToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(

            $objMOCKIMArrayToHTMLTable->mockTableHorizontalTopo(),
            $objIMArrayBiToHTMLTable->getLinhaTopoHorizontal(
                $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional()
            )->getHTML()

        );
    }


    public function testgetLinhaValor()
    {
        $objIMArrayBiToHTMLTable = new IMArrayBiToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(
            $objMOCKIMArrayToHTMLTable->mockTableValor(),
            $objIMArrayBiToHTMLTable->getLinhaValor(
                $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional(),
                1
            )->getHTML()
        );
    }


    public function testconvertTabelaHorizontal()
    {
        $objIMArrayBiToHTMLTable = new IMArrayBiToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(
            $objMOCKIMArrayToHTMLTable->mockTableHorizontalBidimensional(),
            $objIMArrayBiToHTMLTable->convertTabelaHorizontal(
                $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional()
            )->getHTML()
        );

    }


    public function testgetColunaValor()
    {
        $objIMArrayBiToHTMLTable = new IMArrayBiToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(
            $objMOCKIMArrayToHTMLTable->mockTableColunaVerticalBidimensional2(),
            $objIMArrayBiToHTMLTable->getColunaValor(
                $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional(),
                'Coluna 2'
            )
        );
    }


    public function testconvertTabelaVertical()
    {
        $objIMArrayBiToHTMLTable = new IMArrayBiToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(
            $objMOCKIMArrayToHTMLTable->mockTableVerticalBidimensional(),
            $objIMArrayBiToHTMLTable->convertTabelaVertical(
                $objMOCKIMArrayToHTMLTable->getArrayTableBidimensional()
            )->getHTML()
        );
    }


}

?>