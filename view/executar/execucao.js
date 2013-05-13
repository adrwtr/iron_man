function salvarExecucao()
{
   $('#salvar').val('1');
   $('#form_execucao').attr("action", "control/executar/salvar_nova_execucao.php" );
   $('#form_execucao').submit();
}