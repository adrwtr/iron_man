<?
namespace info_data\apps;

use imclass\apps\AppsDisponiveis;

/**
 * Classe responsavel por mapear todas as apps da Horus
 */
class HorusApps
{

    public function getApps()
    {
        $objAppsDisponiveis = new AppsDisponiveis('apps/horus/');

        $objAppsDisponiveis->setNewApp('clearEstagio');
        $objAppsDisponiveis->setNewApp('getAlunosFromIE');
        $objAppsDisponiveis->setNewApp('getPessoasFromIE');
        $objAppsDisponiveis->setNewApp('getPessoasFromEmpresa');
        $objAppsDisponiveis->setNewApp('getAgendasAvaliacoesFromEstagios');
        $objAppsDisponiveis->setNewApp('getEmpresasFromPessoas');
        $objAppsDisponiveis->setNewApp('getGruposSistemaEstagio');
        $objAppsDisponiveis->setNewApp('getDadosFromPessoa');
        $objAppsDisponiveis->setNewApp('getEstagiosFromPessoas');

        return $objAppsDisponiveis;
    }
}

?>