<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

/**
 * Cria uma lista de seleção combo box
 */
class InputSelectCombo extends AbstractInput
{

    /**
     * array de valores que poderá ser selecionado
     * pelo usuario
     * @var array
     */
    var $arrValores;

    /**
     * Retorna o tipo do campo
     * @return string
     */
    public function getTipo()
    {
        return 'InputSelectCombo';
    }

    /**
     * Adiciona um valor
     * @param string
     * @param string
     */
    public function addValoresCampo($label, $valor)
    {
        $this->arrValores[ $valor ] = $label;
    }

    /**
     * Retorna o array de valores
     * @return array
     */
    public function getArrValores()
    {
        return $this->arrValores;
    }

    /**
     * Retorna o componente pronto
     * @return string html
     */
    public function getComponente()
    {
        $retorno = '
        <div class="input-group">
        <span class="input-group-addon">' . $this->getLabel() . '</span>

        <div class="list-group">
        <select name="'. $this->getNome() .'">
        <option value="">Selecione</option>
        ';

        foreach ($this->getArrValores() as $key => $value) 
        {
            $retorno .= '<option value="'. $key .'" '. ( $this->getValor() == $key ? 'selected="selected"' : '' )  .'>';
            $retorno .= $value;
            $retorno .= '</option>';
        }

        $retorno .= '</select></div>';        
        $retorno .= '</div>';

        return $retorno;
    }
}