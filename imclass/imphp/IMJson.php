<?php
namespace imclass\imphp;

/**
 * Classe de camada de execu��o do comando json padrao do php
 */
class IMJson
{

    /**
     * Encode do PHP
     *
     * @param  string $valor [description]
     * @return [type]        [description]
     */
    public function encode($valor = '')
    {
        if (is_array($valor)) {
            $valor = IMJson::utf8EncodeAll($valor);
        }

        return json_encode($valor);
    }

    /**
     * Decode do PHP
     *
     * @param  [type] $valor [description]
     * @return [type]        [description]
     */
    public function decode($valor)
    {
        $valor = json_decode($valor, true);

        if (is_array($valor)) {
            $valor = IMJson::utf8DecodeAll($valor);
        }

        return $valor;
    }

    /**
     * Codifica para UTF8 todos os elementos do array
     * !recursivo
     *
     * @param  [array] $dat [description]
     * @return [type]      [description]
     */
    public function utf8EncodeAll($dat)
    {
        if (is_string($dat)) {
            return utf8_encode($dat);
        }
        
        $ret = array();

        foreach ($dat as $i => $d) {
            $ret[ $i ] = IMJson::utf8EncodeAll($d);
        }

        return $ret;
    }


    /**
     * Decodifica para UTF8 todos os elementos do array
     * !recursivo
     *
     * @param  [array] $dat [description]
     * @return [type]      [description]
     */
    public function utf8DecodeAll($dat)
    {
        if (is_string($dat)) {
            return utf8_decode($dat);
        }
        
        $ret = array();

        foreach ($dat as $i => $d) {
            $ret[ $i ] = IMJson::utf8DecodeAll($d);
        }

        return $ret;
    }
}