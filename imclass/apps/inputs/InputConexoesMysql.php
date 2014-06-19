<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;
use imclass\imphp\file\DiretorioManipulation;

/**
 * Representa um campo de combo box que mostra todas as conexões mysql disponiveis
 * que estão na pasta info_data/base
 */
class InputConexoesMysql extends AbstractInput
{
    /**
     * diretorios que se encontram as conexoes mysql
     */
    var $dir_conexoes;

    public function __construct()
    {
        $this->setDirConexoes('../info_data/base/');
    }

    public function setDirConexoes($valor)
    {
        $this->dir_conexoes = $valor;
    }

    /**
     * retorna o nome do diretorio
     * @return string
     */
    public function getDirConexoes()
    {
        return $this->dir_conexoes;
    }


    /**
     * retorna o componente html
     * @return string
     */
    public function getComponente()
    {
        $campo = '
        <div class="row">
        <div class="col-lg-6">
        <div class="input-group">
        <div class="input-group-btn">
        <button type="button" 
        class="btn btn-default dropdown-toggle" 
        data-toggle="dropdown">
        Conexoes
        <span class="caret">
        </span></button>
        <ul class="dropdown-menu">
        ';

        foreach ($this->getAllConexoes() as $key => $value) {
            $campo .= '<li><a href="#" 
            onclick="$(\'#' . $this->getNome() . '\').val(\'' . $value . '\');">
            ' . $value . '</a></li>';
        }

        $campo .= '
        </ul>
        </div>
        <!-- /btn-group -->
        <input type="text" class="form-control" 
        id="' . $this->getNome() . '"
        name="' . $this->getNome() . '"
        value="' . $this->getValor() . '">
        </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        ';

        return $campo;
    }

    /**
     * Retorna o tipo do campo
     * @return str
     */
    public function getTipo()
    {
        return 'InputConexoesMysql';
    }

    private function getAllConexoes()
    {
        $arrArquivos = DiretorioManipulation::getAllArquivos(
            $this->getDirConexoes()
        );

        return $arrArquivos;
    }
}