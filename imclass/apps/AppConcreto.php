<?php
namespace imclass\apps;

use imclass\apps\IAppInterface;
use imclass\apps\link\LinkCampo;

/**
 * Classe concreta base que implementa a base de uma interface
 * Nao usar esta classe, ela deve ser extendida - representa uma aplicacao
 */
class AppConcreto implements IAppInterface
{

    // descricao da aplicacao
    var $str_descricao;

    // campos utilizados pela aplicacao
    var $arrInputs;

    // valores atribuidos aos campos
    var $arrInputsValores;

    // campos que podem ser linkados a esta aplicacao
    var $arrCamposLinkados;

    // campos que podem ser retornados
    var $arrRetornosLinkados;

    var $resultado;

    /**
     * Seta a descricao da classe
     * @param string $str_descricao [description]
     */
    public function setDescricao($str_descricao = '')
    {
        $this->str_descricao = $str_descricao;
    }

    /**
     * Retorna a descricao da classe
     * @return [str]
     */
    public function getDescricao()
    {
        return $this->str_descricao;
    }

    /**
     * adiciona um input a aplicacao
     * @param [str] $nome
     */
    public function setInput($objInput)
    {
        $this->arrInputs[ ] = $objInput;
    }

    /**
     * Altera um input na aplicação
     * @param [type] $objInput [description]
     * @param [type] $key      [description]
     */
    public function setInputByKey($objInput, $key = 0)
    {
        $this->arrInputs[ $key ] = $objInput;
    }

    /**
     * Retorna todos os inputs possivel
     * @return [array]
     */
    public function getArrInputs()
    {
        return $this->arrInputs;
    }


    /**
     * Seta valor de um input
     * @param [str] $nome  [description]
     * @param [str] $valor [description]
     */
    public function setInputValor($nome, $valor)
    {
        $this->arrInputsValores[ $nome ] = $valor;
    }

    /**
     * Recupera um valor de um input
     * @param  [type] $nome [description]
     * @return [type]       [description]
     */
    public function getInputValor($nome)
    {
        return $this->arrInputsValores[ $nome ];
    }

    /**
     * Deve ser criado nas classes extendidas
     * @return [type] [description]
     */
    public function executar()
    {
        return $this;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * mostra algum resultado na tela.. saida output
     */
    public function getResultadoOutput()
    {
        return null;
    }

    /**
     * Retorna se existe um componente com o nome setado na classe
     *
     * @param  [type]  $nome [description]
     * @return boolean       [description]
     */
    public function hasInput($nome)
    {
        return (isset($this->arrInputsValores[ $nome ]));
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

    /**
     * toda classe app pode ter campos linkados
     */
    public function setCamposLinkados(LinkCampo $objLinkCampo)
    {
        $this->arrCamposLinkados[ ] = $objLinkCampo;
    }

    /**
     * toda classe app pode retornar um valor para um campo linkado
     */
    public function setRetornosLinkados(LinkCampo $objLinkCampo)
    {
        $this->arrRetornosLinkados[ ] = $objLinkCampo;
    }

    public function getLinkCampos()
    {
        return $this->arrCamposLinkados;
    }

    public function getLinkRetornos()
    {
        return $this->arrRetornosLinkados;
    }
}

?>