<?      
namespace imclass\apps\inputs;

use imclass\apps\inputs\iInput;

/**
 * Cria uma lista de seleção com o mouse como se fosse uma tabela
 */
class InputSelectList implements iInput {

   var $nome;
   var $label;
   var $arrValores;

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
      $retorno = '
      <div class="input-group">
      <span class="input-group-addon">'. $this->getLabel() . '</span>
      
      <div class="list-group">
      ';

      foreach ($this->getArrValores() as $key => $opcao ) 
      {
         $retorno .= '
         <a href="#" class="list-group-item '.  ( $this->getValor() == $key ? "active" : "" ) .'">
         ';
         $retorno .= $opcao;
         $retorno .= '</a>';
      }

      $retorno .= '</div>';

      return $retorno;
   }

   public function getTipo()
   {
      return 'InputSelectList';
   }


   public function setValor( $valor )
   {
      $this->valor = $valor;
   }

   public function getValor()
   {
      return $this->valor;
   }

   public function addValor( $label, $valor )
   {
      $this->arrValores[$valor] = $label;
   }

   public function getArrValores()
   {
      return $this->arrValores;
   }

}
?>