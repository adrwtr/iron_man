<?php
namespace imclass\banco_dados;

/**
 * Classe que representa um resultado de uma execu��o SQL
 * geralmente um array bi dimensional
 */
class IMResultado
{

    /**
     * Array de dados
     */
    public $arr;

    /**
     * construtor seta array como nulo
     */
    public function __construct()
    {
        $this->set( array() );
    }

    /**
     * Retorna o array de dados
     */
    public function get()
    {
        return $this->arr;
    }

    /**
     * Seta o array de dados
     * @param [array] $arr [description]
     */
    public function set( $arr )
    {
        $this->arr = $arr;
    }

    /**
     * Retorna um array com todos os campos
     * @return [array]
     */
    public function getArrayCampos()
    {
        $array = $this->get();
        $array = $array[ 0 ];

        return array_keys( $array );
    }

    /**
     * Retorna todos os valores de um determinado campo
     *
     * @param  [string] $campo [Nome campo]
     * @return [array]
     */
    public function getValuesFromCampo( $teste_campo )
    {
        $arrResultado = $this->get();
        $valores = array();

        if (is_array( $arrResultado )) {
            foreach ($arrResultado as $resultado_id => $resultado_v) {
                foreach ($resultado_v as $campo => $valor) {
                    if ($campo == $teste_campo) {
                        $valores[ ] = $valor;
                    }
                }
            }
        }

        return $valores;
    }

    /**
     * Recupera uma linha do resultado
     * @param  [int] $cd_linha [description]
     * @return [array]           [description]
     */
    public function getLinha( $cd_linha )
    {
        $arrResultado = $this->get();

        if (is_array( $arrResultado )) {
            $indice = $cd_linha - 1;
            return $arrResultado[ $indice ];
        }

        return array();
    }

}

?>