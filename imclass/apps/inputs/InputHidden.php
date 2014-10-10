<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

/**
 * Representa um campo de texto simples.. uma linha só para digitação
 */
class InputHidden extends AbstractInput
{
    /**
     * Retorna o componente html
     * @return string
     */
    public function getComponente()
    {
        return '<input type="hidden" class="form-control" 
name="' . $this->getNome() . '" placeholder="" 
value="' . $this->getValor() . '" />';
    }

    /**
     * Retorna o tipo
     */
    public function getTipo()
    {
        return 'InputHidden';
    }
}