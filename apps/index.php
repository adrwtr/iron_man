<?
// mostra todas as apps dispon�veis
define('C_PATH_RAIZ', '../');

require_once("nucleo.php");
require_once("iniciador_bootstrap.php");

use info_data\apps\BancoDadosApps;
use info_data\apps\HorusApps;
use info_data\apps\UnimestreApps;

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


// Unimestre
$objUnimestreApps = new UnimestreApps();

$arrApps = array_merge(
    $arrApps,
    $objUnimestreApps
        ->getApps()
        ->getAllApps()
);

require_once(C_PATH_VIEW . 'index.php');
?>