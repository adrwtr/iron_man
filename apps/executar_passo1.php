<?
// mostra os valores dos apps a serem preenchidos pelo usuario
define('C_PATH_RAIZ',      '../');

require_once("nucleo.php");
require_once("iniciador_bootstrap.php");

$path = $_REQUEST['path'];
$nome = $_REQUEST['nome'];

require_once( C_PATH_RAIZ .  $path . '.php' );

$objiAppInterface = new $nome();
 
$descricao = $objiAppInterface->getDescricao();
$arrInputs = $objiAppInterface->getArrInputs();


require_once( C_PATH_VIEW. 'executar_passo1.php');
?>