<?php
namespace imclass\html\table;

use imclass\html\table\IMHtmlTd;

/**
 * Classe que simula uma tr
 */
class IMHtmlTr
{

    private $arrObjIMHtmlTdList;
    private $attr;

    public function setAttr($value)
    {
        $this->attr = $value;
        return $this;
    }

    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * @return mixed
     */
    public function getArrIMHtmlTdList()
    {
        return $this->arrObjIMHtmlTdList;
    }

    /**
     * @param mixed $arrObjIMHtmlTd
     */
    public function setArrIMHtmlTdList(array $arrObjIMHtmlTdList)
    {
        $this->arrObjIMHtmlTdList = $arrObjIMHtmlTdList;
    }

    /**
     * Adiciona uma nova td
     *
     * @param IMHtmlTd $objIMHtmlTd
     */
    public function addTd(IMHtmlTd $objIMHtmlTd = null)
    {
        if ($objIMHtmlTd == null) {
            $this->arrObjIMHtmlTdList[ ] = new IMHtmlTd();

            return $this;
        }

        $this->arrObjIMHtmlTdList[ ] = $objIMHtmlTd;
        return $this;
    }

    /**
     * retorna se tem alguma coluna definida - td
     * @return bool
     */
    public function temColunas()
    {
        return (count($this->arrObjIMHtmlTdList) > 0);
    }

    /**
     * Return html
     * @return str
     */
    public function getHTML()
    {
        $html = '';

        $html = "<tr " . $this->getAttr() . ">\n";

        if ($this->temColunas()) {
            foreach ($this->getArrIMHtmlTdList() as $key => $objIMHtmlTd) {
                $html .= $objIMHtmlTd->getHTML();
            }
        }

        $html .= "</tr>\n";

        return $html;
    }
}