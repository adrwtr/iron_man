<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

/**
 * Representa um campo de texto multiplas linhas.. 
 */
class InputTextArea extends AbstractInput
{
    /**
     * Retorna o componente html
     * @return string
     */
    public function getComponente()
    {
        return '<div class="input-group">
      <span class="input-group-addon">' . $this->getLabel() . '</span>
      <textarea class="form-control"
         name="' . $this->getNome() . '" 
         id="' . $this->getNome() . '" cols="80" rows="10">' . $this->getValor() . '</textarea>   
      </div><BR />';
    }

    /**
     * Retorna o tipo
     */
    public function getTipo()
    {
        return 'InputTextArea';
    }
}