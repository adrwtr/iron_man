<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

/**
 * Representa um campo de texto simples.. uma linha só para digitação
 */
class InputText extends AbstractInput
{
    /**
     * Retorna o componente html
     * @return string
     */
    public function getComponente()
    {
        return '
      <div class="input-group">
      <span class="input-group-addon">' . $this->getLabel() . '</span>
      <input type="text" class="form-control" 
         name="' . $this->getNome() . '" placeholder="" 
         value="' . $this->getValor() . '">
      </div><BR />';
    }

    /**
     * Retorna o tipo
     */
    public function getTipo()
    {
        return 'InputText';
    }
}