<?php
namespace test\imclass\conversores\imarray;

use test\imclass\conversores\imarray\MOCKIMArrayToHTMLTable;
use imclass\conversores\imarray\IMArraySimplesToHTMLTable;

class IMArraySimplesToHTMLTableTest extends \PHPUnit_Framework_TestCase
{
    public function testconvertTabelaHorizontal()
    {
        $objIMArraySimplesToHTMLTable = new IMArraySimplesToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(
            $objMOCKIMArrayToHTMLTable->mockTableHorizontal(),
            $objIMArraySimplesToHTMLTable->convertTabelaHorizontal(
                $objMOCKIMArrayToHTMLTable->getArrayTable()
            )->getHTML()
        );
    }


    public function testconvertTabelaVertical()
    {

        $objIMArraySimplesToHTMLTable = new IMArraySimplesToHTMLTable();
        $objMOCKIMArrayToHTMLTable = new MOCKIMArrayToHTMLTable();

        $this->assertEquals(
            $objMOCKIMArrayToHTMLTable->mockTableVertical(),
            $objIMArraySimplesToHTMLTable->convertTabelaVertical(
                $objMOCKIMArrayToHTMLTable->getArrayTable()
            )->getHTML()
        );
    }
}

?>