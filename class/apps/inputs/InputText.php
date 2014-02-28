<?
require_once( C_PATH_CLASS . 'apps/inputs/iInput.php' );

/**
 * Representa um campo de texto simples.. uma linha só
 */
class InputText implements iInput {

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
      <input type="text" class="form-control" name="' . $this->getNome() . '" placeholder="">
      </div><BR />';
   }

   public function getTipo()
   {
      return 'InputText';
   }

}
?>