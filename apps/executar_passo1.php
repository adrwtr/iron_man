<?
// mostra todas as apps disponíveis
require_once("nucleo.php");

define('C_PATH', '../');
define('C_PATH_VIEW', C_PATH . 'views/' );
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );
define('C_PATH_BOOT', C_PATH . 'externos/bootstrap-3.1.1-dist/' );
define('C_PATH_ANGULAR', C_PATH . 'externos/angularjs/angular.min.js' );


$path = $_REQUEST['path'];
$nome = $_REQUEST['nome'];

require_once( C_PATH .  $path . '.php' );

$objiAppInterface = new $nome();
 
$descricao = $objiAppInterface->getDescricao();
$arrInputs = $objiAppInterface->getArrInputs();


require_once( C_PATH_VIEW. 'executar_passo1.php');
?>