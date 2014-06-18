<?php
namespace test\imclass\html\table;

use imclass\html\table\IMHtmlTd;

/**
 * Classe que simula uma td
 */
class IMHtmlTdTest extends \PHPUnit_Framework_TestCase
{

    public function testsetValor()
    {
        $objIMhtmlTd = new IMHtmlTd();
        $objIMhtmlTd->setValor('teste');

        $this->assertEquals($objIMhtmlTd->getValor(), 'teste');
    }

    public function testsetAttr()
    {
        $objIMhtmlTd = new IMHtmlTd();
        $objIMhtmlTd->setAttr('teste');

        $this->assertEquals($objIMhtmlTd->getAttr(), 'teste');
    }

    public function testgetHTML()
    {
        $valor = 'valor';
        $atributo = 'atributo';

        $objIMhtmlTd = new IMHtmlTd();
        $objIMhtmlTd->setAttr($atributo);
        $objIMhtmlTd->setValor($valor);

        $this->assertEquals(
            $objIMhtmlTd->getHTML(),
            "<td " . $atributo . ">" . $valor . "</td>\n"
        );
    }
}