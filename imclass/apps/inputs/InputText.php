<?php      
namespace imclass\apps\inputs;

use imclass\apps\inputs\Iinput;

/**
 * Representa um campo de texto simples.. uma linha só para digitação
 */
class InputText implements Iinput {

   var $nome;
   var $label;

   public function setNome( $valor )
   {
      $this->nome = $valor;
   }

   public function getNome()
   {
      return $this->nome;
   }

   public function setLabel( $valor )
   {
      $this->label = $valor;
   }

   public function getLabel()
   {
      return $this->label;
   }

   public function getComponente()
   {
      return '
      <div class="input-group">
      <span class="input-group-addon">'. $this->getLabel() . '</span>
      <input type="text" class="form-control" 
         name="' . $this->getNome() . '" placeholder="" 
         value="'. $this->getValor() .'">
      </div><BR />';
   }

   public function getTipo()
   {
      return 'InputText';
   }


   public function setValor( $valor )
   {
      $this->valor = $valor;
   }

   public function getValor()
   {
      return $this->valor;
   }
}
?>