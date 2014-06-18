<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\Iinput;
use imclass\imphp\file\DiretorioManipulation;

/**
 * Representa um campo de combo box que mostra todas as conexões mysql disponiveis
 * que estão na pasta info_data/base
 */
class InputConexoesMysql implements Iinput {

    var $nome;
    var $label;
    var $valor;

    var $dir_conexoes;

    public function __construct()
    {
        $this->setDirConexoes('../info_data/base/');
    }

    public function setNome($valor)
    {
        $this->nome = $valor;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setLabel($valor)
    {
        $this->label = $valor;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setDirConexoes($valor)
    {
        $this->dir_conexoes = $valor;
    }

    public function getDirConexoes()
    {
        return $this->dir_conexoes;
    }


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
            onclick="$(\'#'. $this->getNome() . '\').val(\''. $value .'\');">
            '. $value .'</a></li>';
        }

        $campo .= '
        </ul>
        </div>
        <!-- /btn-group -->
        <input type="text" class="form-control" 
        id="'. $this->getNome() .'" 
        name="'. $this->getNome() .'"
        value="'. $this->getValor() .'">
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

    public function getAllConexoes()
    {
        $arrArquivos = DiretorioManipulation::getAllArquivos(
            $this->getDirConexoes()
        );

        return $arrArquivos;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }
}