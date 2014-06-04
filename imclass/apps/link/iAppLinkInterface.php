<?
namespace imclass\apps\link;

/**
 * Interface para um link de execução
 * essa interface indica como uma execução irá linkar com outra execução
 */
interface iAppLinkInterface
{
   public function addExecucao( $nome_funcao, $tipo_retorno='' );
   public function getExecucoes( $tipo_retorno='' );
}
?>