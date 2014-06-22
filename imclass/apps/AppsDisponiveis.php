<?php
namespace imclass\apps;

use imclass\apps\AppDescricao;

/**
 * Classe responsavel por ter uma lista de todas as apps disponiveis
 */
class AppsDisponiveis
{

    /**
     * array de apps
     * @var [AppDescricao]
     */
    var $arrApps;

    /**
     * path principal das apps
     * @var [str]
     */
    private $path;

    public function __construct($valor = '')
    {
        $this->setPath($valor);
    }

    /**
     * adiciona um app na lista de apps
     * @param [str] $nome [nome da classe]
     * @param [str] $path [path da classe]
     */
    public function setNewApp($nome, $path = '')
    {
        if ($path == '') {
            $path = $this->getPath();
        }

        $objAppDescricao = new AppDescricao();
        $objAppDescricao->setPath($path);
        $objAppDescricao->setClass($nome);

        $this->arrApps[ $nome ] = $objAppDescricao;
    }

    /**
     * Retorna um app da lista
     * @param [str] [nome da classe]
     * @return  [objeto AppDescricao]
     */
    public function getAppByName($nome)
    {
        return $this->arrApps[ $nome ];
    }

    /**
     * Retorna todas as apps disponiveis
     * @return [array] [array de objetos]
     */
    public function getAllApps()
    {
        return $this->arrApps;
    }

    /**
     * pega path padrao
     * @return [type] [description]
     */
    private function getPath()
    {
        return $this->path;
    }

    /**
     * seta path padrao
     * @param [type] $v [description]
     */
    private function setPath($v = '')
    {
        $this->path = $v;
    }
}