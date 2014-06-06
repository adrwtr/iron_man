<?
// mostra os valores dos apps a serem preenchidos pelo usuario
define('C_PATH_RAIZ',      '../');

require_once("nucleo.php");
require_once("iniciador_bootstrap.php");

use imclass\apps\AppExecucoes;

require_once( 'view_class/ExecutarPasso1.php' );
$objExecutarPasso1 = new ExecutarPasso1();

$objExecutarPasso1->getRequests();
$objExecutarPasso1->createClass();

$objiAppInterface = $objExecutarPasso1->objiAppInterface;
 
$descricao = $objiAppInterface->getDescricao();
$arrInputs = $objiAppInterface->getArrInputs();


/**
 * recupera execucoes
 */
$objAppExecucoes = new AppExecucoes();
$objAppExecucoes->registerDoctrine( $objIMDoctrine );

$arrObjExecucoes = $objAppExecucoes->getExecucoes(
   $nome,
   $path
);

require_once( C_PATH_VIEW. 'executar_passo1.php');
?>