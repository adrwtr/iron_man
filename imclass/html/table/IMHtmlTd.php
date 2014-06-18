<?php
namespace imclass\html\table;

/**
 * Classe que simula uma td
 */
class IMHtmlTd
{

    private $valor;
    private $attr;

    /**
     * seta o valor da coluna
     *
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * seta os atributos
     *
     * @param mixed $str_attr
     */
    public function setAttr($str_attr = '')
    {
        $this->attr = $str_attr;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * Retorna o conteudo html
     * @return [str]
     */
    public function getHTML()
    {
        return "<td " . $this->getAttr() . ">" . $this->getValor() . "</td>\n";
    }
}