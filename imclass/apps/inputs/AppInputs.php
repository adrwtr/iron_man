<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\IInput;

/**
 * Classe responsavel por armazenar os inputs de um app
 */
class AppInputs
{
    // campos utilizados pela aplicacao
    var $arrObjInput;

    // valores atribuidos aos campos
    var $arrInputValor;

    /**
     * adiciona um input a aplicacao
     * @param [IInput] $nome
     */
    public function setInput(IInput $objInput)
    {
        $this->arrObjInput[] = $objInput;
    }

    /**
     * Altera um input na aplicação
     * @param [type] $objInput [description]
     * @param [type] $key      [description]
     */
    public function setInputByKey(IInput $objInput, $key = 0)
    {
        $this->arrObjInput[ $key ] = $objInput;
    }

    /**
     * Retorna todos os inputs possivel
     * @return [array]
     */
    public function getArrInputs()
    {
        return $this->arrObjInput;
    }

    /**
     * Seta valor de um input
     * @param [str] $nome  [description]
     * @param [str] $valor [description]
     */
    public function setInputValor($nome, $valor)
    {
        $this->arrInputValor[ $nome ] = $valor;
    }

    /**
     * Recupera um valor de um input
     * @param  [type] $nome [description]
     * @return [type]       [description]
     */
    public function getInputValor($nome)
    {
        return $this->arrInputValor[ $nome ];
    }

    /**
     * Retorna se existe um componente com o nome setado na classe
     * e que tenha valor setado
     *
     * @param  [type]  $nome [description]
     * @return boolean       [description]
     */
    public function hasInputValor($nome)
    {
        return (isset($this->arrInputValor[ $nome ]));
    }

    /**
     * Retorna a chave de um input do array de inputs
     * @param  [type] $nome [description]
     * @return [type]       [description]
     */
    public function getInputKeyByName($nome)
    {
        foreach ($this->getArrInputs() as $key => $objInput) {
            if ($objInput->getNome() == $nome) {
                return $key;
            }
        }

        return null;
    }
}