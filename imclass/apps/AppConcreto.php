<?php
namespace imclass\apps;

use imclass\apps\IAppInterface;
use imclass\apps\inputs\AppInputs;
use imclass\apps\link\AppLinks;

/**
 * Classe concreta base que implementa a base de uma interface
 * Nao usar esta classe, ela deve ser extendida - representa uma aplicacao
 */
class AppConcreto implements IAppInterface
{
    // descricao da aplicacao
    var $str_descricao;

    // contem o resultado da execução
    var $resultado;

    /**
     * Os inputs da app
     * @var AppInputs
     */
    var $objAppInputs;

    /**
     * Links da app
     * @var AppLinks
     */
    var $objAppLinks;
    
    public function __construct()
    {
        $this->objAppInputs = new AppInputs();
        $this->objAppLinks  = new AppLinks();
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
     * Retorna o objeto que tem todos os links
     * da classe
     * @return AppLinks
     */
    public function getObjAppLinks()
    {
        return $this->objAppLinks;
    }
}