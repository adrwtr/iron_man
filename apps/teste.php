<?
// mostra todas as apps disponíveis
define( 'C_PATH_RAIZ', '../' );
define( 'C_PATH_VIEW', C_PATH_RAIZ . 'views/' );
define( 'C_PATH_INFO', C_PATH_RAIZ . 'info_data/' );
define( 'C_PATH_BOOT', C_PATH_RAIZ . 'externos/bootstrap-3.1.1-dist/' );
define( 'C_PATH_ANGULAR', C_PATH_RAIZ . 'externos/angularjs/angular.min.js' );

require_once( "nucleo.php" );
require_once( "iniciador_bootstrap.php" );

use info_data\apps\BancoDadosApps;
use imclass\beans\internos\execucoes\IMExecucoes;

// banco de dados
$objBancoDadosApps = new BancoDadosApps();

$arrApps = $objBancoDadosApps
   ->getApps()
   ->getAllApps();

vl( $arrApps );
?>