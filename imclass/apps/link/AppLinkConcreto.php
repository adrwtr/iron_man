<?
namespace imclass\apps\link;

use imclass\apps\link\iAppLinkInterface;

/**
 * Classe concreta base que implementa a base de uma interface
 * Não usar esta classe, ela deve ser extendida - representa um link entre execuções
 */
class AppLinkConcreto implements iAppLinkInterface { 

   private var $arrExecucoes;

   public function addExecucao( $nome_funcao, $tipo_retorno='' )
   {
      
   }
   public function getExecucoes( $tipo_retorno='' );
}
?>