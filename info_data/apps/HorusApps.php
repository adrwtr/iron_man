<?
require_once("../apps/nucleo.php");
define('C_PATH', '../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );

require_once( C_PATH_CLASS . 'apps/AppsDisponiveis.php' );

/**
 * Classe responsavel por mapear todas as apps da Horus
 */
class HorusApps {

   public function getApps()
   {
      $objAppsDisponiveis = new AppsDisponiveis();
      $objAppsDisponiveis->setNewApp( 'clearEstagio', 'apps/horus/' );

      return $objAppsDisponiveis;
   }
}
?>