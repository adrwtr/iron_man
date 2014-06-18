<?
namespace info_data\apps;

use imclass\apps\AppsDisponiveis;

/**
 * Classe responsavel por mapear todas as apps de banco de dados
 */
class BancoDadosApps
{

    public function getApps()
    {
        $objAppsDisponiveis = new AppsDisponiveis();

        $objAppsDisponiveis->setNewApp( 'getInsertArray', 'apps/banco_dados/' );
        $objAppsDisponiveis->setNewApp( 'getTabelasFromBanco', 'apps/banco_dados/' );
        $objAppsDisponiveis->setNewApp( 'getCamposFromTabela', 'apps/banco_dados/' );

        return $objAppsDisponiveis;
    }
}

?>