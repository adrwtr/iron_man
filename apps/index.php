<?
// mostra todas as apps disponíveis
require_once("nucleo.php");

define('C_PATH', '../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );
define('C_PATH_BOOT', C_PATH . 'externos/bootstrap-3.1.1-dist/' );
define('C_PATH_ANGULAR', C_PATH . 'externos/angularjs/angular.min.js' );

require_once( C_PATH_INFO . 'apps/BancoDadosApps.php' );
require_once( C_PATH_INFO . 'apps/HorusApps.php' );

// banco de dados
$objBancoDadosApps = new BancoDadosApps();

$arrApps = $objBancoDadosApps
            ->getApps()
            ->getAllApps();

// horus
$objHorusApps = new HorusApps();

$arrApps = array_merge( 
   $arrApps, 

   $objHorusApps
      ->getApps()
      ->getAllApps() 
);

require_once( C_PATH_BOOT. 'index.php');
?>