<?
/**
 * Este arquivo � respons�vel por iniciar o php da maneira certa
 * referente aos namespaces do projeto
 */

/**
 * Esta fun��o ir� executar o load das classes do namespace
 * ela � executada no escopo global
 */
function __autoload($c)
{   
   require_once C_PATH_RAIZ . $c . '.php';
}
?>