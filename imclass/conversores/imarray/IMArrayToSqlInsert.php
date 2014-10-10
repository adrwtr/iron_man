<?php
namespace imclass\conversores\imarray;

/**
 * Classe responsável por converter um array em um sql insert into
 */
class IMArrayToSqlInsert
{

    /**
     * Converte o resultado para insert into
     * @param  nome da tabela
     * @param  valores
     * @param  campos
     * @return  string sql
     */
    public function convertToInsert($tabela, $arrResultado)
    {
        $valores = array();
        $sql_campos = '';
        $sql_insert = '';
        $sql_completo = '';
        $sql_campos = $this->getSQLCampos($arrResultado);

        $sql_insert = "insert into $tabela $sql_campos values  ";

        if (is_array($arrResultado)) 
        {
            $sql_valores = $this->converteArraySimples($arrResultado);

            if (is_array($arrResultado[0]))
            {
                $sql_valores = $this->converteArrayBidimensional($arrResultado);
            }
        }

        $sql_completo .= $sql_insert . $sql_valores . " \n";

        return $sql_completo;
    }

    /**
     * Retorna a lista de campos em formato sql
     * @param  [arr] $arrCampos [description]
     * @return [str]            [description]
     */
    private function getSQLCampos($arrCampos)
    {
        $arrCampos = array_keys($arrCampos);
        $sql_campos = '';

        if (is_array($arrCampos) == true) {
            $sql_campos = implode(",", $arrCampos);
        }

       /* pela unit de test nao entrav a aqui.. verificar
        if ( $sql_campos == '0' )
        {
            $sql_campos = '';
        }*/

        return $sql_campos;
    }

    private function converteArraySimples($array)
    {
        return "(" . implode("','", $array) .");\n";
    }

    private function converteArrayBidimensional($array)
    {
        foreach ( $array as $resultado_id => $resultado_v )
        {
            $valor = implode("','", $resultado_v);
            $valor = substr($valor, 0, strlen($valor)-3);
            $valor = "('". $valor ."'),";
            $valores .= $valor;
        }

        $valores = substr($valores, 0, strlen($valores)-1);
        $valores .= ";\n";

        return $valores;
    }
}