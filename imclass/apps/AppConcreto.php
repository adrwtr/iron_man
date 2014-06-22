<?php
namespace imclass\apps;

use imclass\apps\IAppInterface;
use imclass\apps\inputs\AppInputs;
use imclass\apps\link\LinkCampo;

/**
 * Classe concreta base que implementa a base de uma interface
 * Nao usar esta classe, ela deve ser extendida - representa uma aplicacao
 */
class AppConcreto implements IAppInterface
{
    // descricao da aplicacao
    var $str_descricao;

    /**
     * Os inputs da app
     * @var AppInputs
     */
    var $objAppInputs;
    
    // campos que podem ser linkados a esta aplicacao
    var $arrCamposLinkados;

    // campos que podem ser retornados
    var $arrRetornosLinkados;

    // contem o resultado da execução
    var $resultado;

    public function __construct()
    {
        $this->objAppInputs = new AppInputs();
    }

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
     * Deve ser criado nas classes extendidas
     * @return [type] [description]
     */
    public function executar()
    {
        return $this;
    }

    /**
     * Seta o resultado esperado
     * @return mixed
     */
    public function setResultado($valor)
    {
        $this->resultado = $valor;
    }

    /**
     * Retorna o Resultado
     * @return mixed
     */
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
     * Retorna o objeto que tem todos os inputs
     * da classe
     * @return AppInputs
     */
    public function getObjAppInputs()
    {
        return $this->objAppInputs;
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

    /*// toda classe app pode ter campos linkados
    public function setCamposLinkados(LinkCampo $objLinkCampo);

    // toda classe app pode retornar um valor para um campo linkado
    public function setRetornosLinkados(LinkCampo $objLinkCampo);

    // quais campos estão likados com outras apps
    public function getLinkCampos();

    public function getLinkRetornos();*/
}