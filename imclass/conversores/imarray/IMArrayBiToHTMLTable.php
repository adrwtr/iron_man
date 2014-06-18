<?php
namespace imclass\conversores\imarray;

use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

/**
 * Classe responsável pro converter arrays em tabelas htmls
 */
class IMArrayBiToHTMLTable
{

    /**
     * Converte um array em uma tabela e imprime os valores na horizontal
     * Os indices são impressos acima, e a lista de valores uma abaixo da outra
     * O array precisa ser bidimensional
     *
     * @param  [array] $arr [description]
     * @return IMHtmlTable
     */
    public function convertTabelaHorizontal($arr)
    {
        $objIMHtmlTable = new IMHtmlTable();

        // linha principal
        $objIMHtmlTr = $this->getLinhaTopoHorizontal($arr);
        $objIMHtmlTable->addTr($objIMHtmlTr);

        foreach ($arr as $key => $value) {
            $objIMHtmlTr = new IMHtmlTr();
            $objIMHtmlTr = $this->getLinhaValor($arr, $key);
            $objIMHtmlTable->addTr($objIMHtmlTr);
        }

        return $objIMHtmlTable;
    }

    /**
     * Converte um array em uma tabela e imprime os valores na vertical
     * Os indices são impressos na esquerda, e a lista de valores na direita
     * O array precisa ser bidimensional
     * @param  [array] $arr [description]
     * @return [str]
     */
    public function convertTabelaVertical($arr)
    {
        $objIMHtmlTable = new IMHtmlTable();

        foreach ($arr[ 0 ] as $key => $v) {
            $arrImprimir[ $key ] = $this->getColunaValor($arr, $key);
        }


        foreach ($arrImprimir as $key => $valores) {
            $objIMHtmlTr = new IMHtmlTr();

            // coluna
            $objIMHtmlTd = new IMHtmlTd();
            $objIMHtmlTd->setValor($key);
            $objIMHtmlTr->addTd($objIMHtmlTd);

            // valores
            foreach ($valores as $key => $value) {
                $objIMHtmlTr->addTd($value);
            }

            $objIMHtmlTable->addTr($objIMHtmlTr);
        }

        return $objIMHtmlTable;
    }

    /**
     * Retorna uma tabela apenas com a linha de topo do array (colunas)
     * Usar apenas no modelo horizontal
     * @param  array
     * @return IMHtmlTr
     */
    public function getLinhaTopoHorizontal($arr)
    {
        $objIMHtmlTr = new IMHtmlTr();
        $arrPrincipal = $arr;
        $arrPrincipal = $arr[ 0 ];

        foreach ($arrPrincipal as $key => $value) {
            $objIMHtmlTd = new IMHtmlTd();
            $objIMHtmlTd->setValor($key);
            $objIMHtmlTr->addTd($objIMHtmlTd);
        }

        return $objIMHtmlTr;
    }

    /**
     * Retorna o conteudo de uma linha inteira
     * Funciona para bidimensional
     * @param  [array] $arr   [description]
     * @param  [int] $linha [description]
     * @return [IMHtmlTr]        [description]
     */
    public function getLinhaValor($arr, $linha)
    {
        $objIMHtmlTr = new IMHtmlTr();
        $arrPrincipal = $arr[ $linha ];

        if (is_array($arrPrincipal)) {
            foreach ($arrPrincipal as $key => $value) {
                $objIMHtmlTd = new IMHtmlTd();
                $objIMHtmlTd->setValor($value);
                $objIMHtmlTr->addTd($objIMHtmlTd);
            }
        }

        return $objIMHtmlTr;
    }

    /**
     * Retorna o conteudo de uma coluna
     * Funciona mais para bidimensional
     * @param  [array] $arr
     * @param  [int] $linha
     * @return [arr of IMHtmlTd]
     */
    public function getColunaValor($arr, $coluna)
    {
        $arrRetornar = null;

        foreach ($arr as $key => $value) {
            foreach ($value as $key => $value) {
                if ($key == $coluna) {
                    $objIMHtmlTd = new IMHtmlTd();
                    $objIMHtmlTd->setValor($value);

                    $arrRetornar[ ] = $objIMHtmlTd;
                }
            }
        }

        return $arrRetornar;
    }
}

?>