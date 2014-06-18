<?php
namespace test\imclass\html;

use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;

class IMHtmlTableTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Seta todo o array
     * @param mixed $arrObjIMHtmlTr
     */
    public function testsetArrIMHtmlTrList()
    {
        $array = array( 0 => 1 );
        $objIMHtmlTable = new IMHtmlTable();
        $objIMHtmlTable->setArrIMHtmlTrList( $array );
        $this->assertEquals( $objIMHtmlTable->getArrIMHtmlTrList(), $array );
    }

    /**
     * Seta os atributos
     * @param mixed $attr
     */
    public function testsetAttr()
    {
        $objIMHtmlTable = new IMHtmlTable();
        $objIMHtmlTable->setAttr( 'valor' );

        $this->assertEquals( $objIMHtmlTable->getAttr(), 'valor' );
    }


    /**
     * Adiciona uma linha
     * @return  this
     */
    public function testaddTr()
    {
        $objIMHtmlTable = new IMHtmlTable();

        // teste null
        $objIMHtmlTable->addTr();
        $array = array( 0 => new IMHtmlTr() );

        $this->assertEquals( $objIMHtmlTable->getArrIMHtmlTrList(), $array );


        // teste criado
        $obj = new IMHtmlTr();
        $objIMHtmlTable->addTr( $obj );

        $array = array(
            0 => new IMHtmlTr(),
            1 => $obj
        );

        $this->assertEquals( $objIMHtmlTable->getArrIMHtmlTrList(), $array );
    }

    public function testtemLinhas()
    {
        $objIMHtmlTable = new IMHtmlTable();
        $this->assertEquals( $objIMHtmlTable->temLinhas(), false );

        $objIMHtmlTable->addTr();
        $this->assertEquals( $objIMHtmlTable->temLinhas(), true );
    }

    public function testgetHTML()
    {
        $objIMHtmlTable = new IMHtmlTable();
        $atributo = 'atributo';

        $html = "<table " . $atributo . ">\n";
        $html .= "</table>\n";

        // vazio
        $objIMHtmlTable->setAttr( $atributo );
        $this->assertEquals( $objIMHtmlTable->getHTML(), $html );

        // novo teste
        $html = "<table " . $atributo . ">\n";
        $objIMHtmlTr = new IMHtmlTr();
        $html .= $objIMHtmlTr->getHTML();
        $html .= "</table>\n";

        $objIMHtmlTable->addTr();

        // com 1 td
        $this->assertEquals( $objIMHtmlTable->getHTML(), $html );

        // novo teste
        $html = "<table " . $atributo . ">\n";
        $objIMHtmlTr = new IMHtmlTr();
        $html .= $objIMHtmlTr->getHTML();
        $html .= $objIMHtmlTr->getHTML();
        $html .= "</table>\n";

        // cuidado: esta adicionando novo na lista (tem 2)
        $objIMHtmlTable->addTr();

        // com 2 td
        $this->assertEquals( $objIMHtmlTable->getHTML(), $html );
    }
}

?>