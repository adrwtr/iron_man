<?php
namespace imclass\apps;

/**
 * Classe que representa nomes para uma app
 * Tem apenas informa��es sobre uma app
 */
class AppDescricao
{

    var $class;
    var $path;

    /**
     * Nome da classe que extende de AppConcreto
     * @param str
     */
    public function setClass($valor)
    {
        $this->class = $valor;
    }

    public function getClass()
    {
        return $this->class;
    }

    /**
     * Path para a classe AppConcreto
     * @param str
     */
    public function setPath($valor)
    {
        $this->path = $valor;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function AppPath()
    {
        return $this->path . $this->class;
    }
}

?>