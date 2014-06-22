<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\IInput;

/**
 * Classe abstrata de um input
 */
abstract class AbstractInput implements IInput
{
    /**
     * Nome do campo
     * @var string
     */
    var $nome;

    /**
     * Label a ser exibido em tela
     * @var string
     */
    var $label;

    /**
     * Valor do campo
     * @var mixed
     */
    var $valor;

    /**
     * retorna o componente a ser exibido em tela
     * @return string html
     */
    abstract public function getComponente();

    /**
     * Retorna o tipo do campo/componente
     * @return str
     */
    abstract public function getTipo();
    
    /**
     * Seta o nome do campo
     * @param string
     */
    public function setNome($valor)
    {
        $this->nome = $valor;
    }

    /**
     * Retorna o nome do campo
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Seta o label
     * @param string
     */
    public function setLabel($valor)
    {
        $this->label = $valor;
    }

    /**
     * Retorna o Label
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * seta o valor do campo
     * @param mixed
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * retorna o valor do campo
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }
}