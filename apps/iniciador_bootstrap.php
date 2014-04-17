<?
/**
 * Este arquivo щ responsсvel por iniciar o php da maneira certa
 * referente aos namespaces do projeto
 */

/**
 * Esta funчуo irс executar o load das classes do namespace
 * ela щ executada no escopo global
 */
function __autoload($c)
{   
   require_once C_PATH_RAIZ . $c . '.php';
}
?>