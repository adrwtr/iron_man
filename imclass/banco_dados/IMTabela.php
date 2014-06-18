<?php
namespace imclass\banco_dados;

/**
 * Classe que representa uma tabela do banco de dados
 */
class IMTabela
{

    private $nome;
    private $arrColunas;

    public function __construct()
    {
        $this->setNome( '' );
        $this->setColunas( array() );
    }

    public function setNome( $valor = '' )
    {
        $this->nome = $valor;
    }

    public function setColunas( $arr = array() )
    {
        $this->arrColunas = $arr;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getColunas()
    {
        return $this->arrColunas;
    }

}

?>