<?
namespace info_data\apps;

use imclass\apps\AppsDisponiveis;

/**
 * Classe responsavel por mapear todas as apps do AppProjetos
 */
class AppProjetosApps
{

    public function getApps()
    {
        $objAppsDisponiveis = new AppsDisponiveis('apps/app_projetos/');

        $objAppsDisponiveis->setNewApp('novoProjeto');
        $objAppsDisponiveis->setNewApp('addPacoteProjeto');
        $objAppsDisponiveis->setNewApp('addPacoteAtividade');
        $objAppsDisponiveis->setNewApp('verPacotesAtividadesProjeto');
        
        return $objAppsDisponiveis;
    }
}

?>