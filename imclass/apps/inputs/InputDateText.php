<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

/**
 * Representa um campo de data
 */
class InputDateText extends AbstractInput
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
         id="'. $this->getNome() .'"
         value="' . $this->getValor() . '">
      </div><BR />      
      <script language="javascript">
        $(\'#'. $this->getNome() .'\').datepicker({
            format: \'dd/mm/yyyy\',
            language:"pt-br"
        });
      </script>
      ';
    }

    /**
     * Retorna o tipo
     */
    public function getTipo()
    {
        return 'InputDateText';
    }
}