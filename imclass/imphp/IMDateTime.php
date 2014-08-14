<?php
namespace imclass\imphp;

/**
 * Camada para as operações com data
 * interface para DateTime
 */
class IMDateTime
{
    private $objDateTime;
    
    public function __construct( $data )
    {
        $this->objDateTime = new \DateTime( $data );
    }

    /**
     * Seta a data para a classe no formato PT-BR
     * @param string data em dd/mm/AAAA
     * @return bool
     */
    public function setDataPtbr($data)
    {
        list( $dia, $mes, $ano ) = explode("/", $data );
        $ano = $this->trataAno($ano);

        $retorno = false;

        if( $ano != null && $mes != null && $dia != null)
        {
            $retorno = $this->objDateTime  
                ->setDate($ano, $mes, $dia);
        }

        return ($retorno !== false ? true : false);
    }

    /**
     * Retorna a data no formato brasileiro
     * @return string dd/mm/YYYY
     */
    public function getDataPtbr()
    {
        return $this->objDateTime
            ->format('d/m/Y');
    }

    public function getDataEn()
    {
        return $this->objDateTime
            ->format('Y-m-d');
    }

    /**
     * Trata o ano de 2 casas, adicionando 20 na frente.
     * @param  [string] $ano
     * @return string YYYY
     */
    private function trataAno($ano)
    {
        return (strlen($ano)==2 ? '20'.$ano : $ano );
    }



}