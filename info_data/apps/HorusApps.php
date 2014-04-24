<?
namespace info_data\apps;

use imclass\apps\AppsDisponiveis;

/**
 * Classe responsavel por mapear todas as apps da Horus
 */
class HorusApps {

   public function getApps()
   {
      $objAppsDisponiveis = new AppsDisponiveis();
      $objAppsDisponiveis->setNewApp( 'clearEstagio', 'apps/horus/' );
      $objAppsDisponiveis->setNewApp( 'getAlunosFromIE', 'apps/horus/' );

      return $objAppsDisponiveis;
   }
}
?>