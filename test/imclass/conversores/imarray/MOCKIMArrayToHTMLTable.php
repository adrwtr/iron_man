<?php
namespace test\imclass\conversores\imarray;

use imclass\conversores\IMArrayToHTMLTable;
use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

class MOCKIMArrayToHTMLTable
{

    /**
     * Tabela horizontal 2 colunas e 1 linhas de valor
     */
    public function mockTableHorizontal()
    {
        $objIMHtmlTable = new IMHtmlTable();

        // linha principal
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        // valores
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        return $objIMHtmlTable->getHTML();
    }

    /**
     * Tabela horizontal 3 linhas resultado
     * 2 colunas e 2 linhas de valor
     */
    public function mockTableHorizontalBidimensional()
    {
        $objIMHtmlTable = new IMHtmlTable();

        // linha principal
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        // valores
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        // valores
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1 A');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2 B');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        return $objIMHtmlTable->getHTML();
    }

    /**
     * Topo de tabela horizontal
     */
    public function mockTableHorizontalTopo()
    {
        // linha principal
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        return $objIMHtmlTr->getHTML();
    }

    /**
     * tabela com coluna e valor
     * 2 linhas de resultado
     */
    public function mockTableVertical()
    {
        $objIMHtmlTable = new IMHtmlTable();

        // linha principal
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);


        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        return $objIMHtmlTable->getHTML();
    }

    /**
     * Tabela com coluna e valores
     * 2 colunas, com 2 valores ( 3 colunas total)
     */
    public function mockTableVerticalBidimensional()
    {
        $objIMHtmlTable = new IMHtmlTable();

        // linha principal
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1 A');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);


        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Coluna 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2 B');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTable->addTr($objIMHtmlTr);

        return $objIMHtmlTable->getHTML();
    }

    /**
     * Apenas valores na horizontal
     * 2 valores em 1 linha ( 2 colunas )
     */
    public function mockTableValor()
    {
        // linha principal
        $objIMHtmlTr = new IMHtmlTr();
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 1 A');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2 B');
        $objIMHtmlTr->addTd($objIMHtmlTd);

        return $objIMHtmlTr->getHTML();
    }


    /**
     * duas colunas em um array simples
     * @return arr
     */
    public function mockTableColunaVerticalBidimensional2()
    {
        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2');
        $arr[ ] = $objIMHtmlTd;

        $objIMHtmlTd = new IMHtmlTd();
        $objIMHtmlTd->setValor('Valor 2 B');
        $arr[ ] = $objIMHtmlTd;

        return $arr;
    }


    // primitivo
    public function getArrayTable()
    {
        return array(
            'Coluna 1' => 'Valor 1',
            'Coluna 2' => 'Valor 2'
        );
    }

    // primitivo
    public function getArrayTableBidimensional()
    {
        return array(
            0 => array(
                'Coluna 1' => 'Valor 1',
                'Coluna 2' => 'Valor 2'
            ),
            1 => array(
                'Coluna 1' => 'Valor 1 A',
                'Coluna 2' => 'Valor 2 B'
            )
        );
    }
}

?>