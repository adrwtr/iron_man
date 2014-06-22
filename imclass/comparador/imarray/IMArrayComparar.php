<?php
namespace imclass\comparador\imarray;

/**
 * Classe responsável por comparar dois arrays
 */
class IMArrayComparar
{

    /**
     * Compara o resultado com outro array - linha a linha
     * retorna um array com valores iguais, e um array com valores diferentes
     *
     * @param  [array]
     * @return [array] com as igualdades e diferenças
     */
    public function comparar($arrayA, $arrayB)
    {
        $arrIguais = array();
        $arrDiferentes = array();

        $iguais = 0;
        $diferentes = 0;

        foreach ($arrayB as $arrayB_id => $arrayB_v) {
            if ($arrayA[ $arrayB_id ] == $arrayB_v) {
                $arrIguais[ $iguais ][ 'coluna' ] = $arrayB_id;
                $arrIguais[ $iguais ][ 'linha' ] = $arrayB_v;

                $iguais++;
            } else {
                $arrDiferentes[ $diferentes ][ 'coluna' ] = $arrayB_id;
                $arrDiferentes[ $diferentes ][ 'linha' ] = $arrayB_v;
                $diferentes++;
            }
        }

        $arrComparacao[ 'arrIguais' ] = $arrIguais;
        $arrComparacao[ 'arrDiferentes' ] = $arrDiferentes;

        return $arrComparacao;
    }
}