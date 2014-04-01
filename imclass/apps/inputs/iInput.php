<?
namespace imclass\apps\inputs;

/**
 * Interface - O que todo input de app deve ter
 */
interface iInput
{
   public function setNome( $valor );
   public function getNome();

   public function setLabel( $valor );
   public function getLabel();

   public function getComponente();
   public function getTipo();
}
?>