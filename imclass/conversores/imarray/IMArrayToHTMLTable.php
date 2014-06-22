<?php
namespace imclass\conversores\imarray;

use imclass\conversores\imarray\IMArrayBiToHTMLTable;
use imclass\conversores\imarray\IMArraySimplesToHTMLTable;

/**
 * Classe responsável pro converter arrays em tabelas htmls
 */
class IMArrayToHTMLTable
{

    /**
     * Converte um array em uma tabela e imprime os valores na horizontal
     * Os indices são impressos acima, e a lista de valores uma abaixo da outra
     *
     * @param  [array] $arr [description]
     * @return IMHtmlTable
     */
    public function convertTabelaHorizontal($arr)
    {
        return $this->verificaBidimensional($arr) == true ?
            $this->getObjIMArrayBiToHTMLTable()->convertTabelaHorizontal($arr) :
            $this->getObjIMArraySimplesToHTMLTable()->convertTabelaHorizontal($arr);
    }

    /**
     * Converte um array em uma tabela e imprime os valores na vertical
     * Os indices são impressos na esquerda, e a lista de valores na direita
     * @param  [array] $arr [description]
     * @return [str]
     */
    public function convertTabelaVertical($arr)
    {
        return $this->verificaBidimensional($arr) == true ?
            $this->getObjIMArrayBiToHTMLTable()->convertTabelaVertical($arr) :
            $this->getObjIMArraySimplesToHTMLTable()->convertTabelaVertical($arr);
    }

    /**
     * retorna se o array é bidimensional
     * @return bool
     */
    public function verificaBidimensional($arr)
    {
        return is_array($arr[ 0 ]);
    }

    /**
     * Retorna um objeto para o conversos de array bidimensionais
     * @return IMArrayBiToHTMLTable
     */
    public function getObjIMArrayBiToHTMLTable()
    {
        return new IMArrayBiToHTMLTable();
    }

    /**
     * Retorna um objeto para o conversos de array simples chave => valor
     * @return IMArraySimplesToHTMLTable
     */
    public function getObjIMArraySimplesToHTMLTable()
    {
        return new IMArraySimplesToHTMLTable();
    }
}