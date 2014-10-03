<?
namespace info_data\apps;

use imclass\apps\AppsDisponiveis;

/**
 * Classe responsavel por mapear todas as apps do UNIMESTRE
 */
class UnimestreApps
{

    public function getApps()
    {
        $objAppsDisponiveis = new AppsDisponiveis('apps/unimestre/');

        $objAppsDisponiveis->setNewApp('getNuParametro');
        $objAppsDisponiveis->setNewApp('getLogGeral');
        
        return $objAppsDisponiveis;
    }
}

?>