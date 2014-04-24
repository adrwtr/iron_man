<?
namespace info_data\base;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;

/**
 * Retorna a conexao com a base local
 */
class ConexaoLocal {

    /**
     * Retorna a conexao com a base local
     *
     * @return IMConexaoBancoDados
     */
    function getConexao()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco("unimestre_horus_branco");
        $objIMConexaoAtributos->setLogin("moodle");
        $objIMConexaoAtributos->setSenha("moodle");
        $objIMConexaoAtributos->setBanco("unimestre_horus_branco");
        $objIMConexaoAtributos->setHost("localhost");
        $objIMConexaoAtributos->setPorta("");

        $objIMConexaoBancoDados = new IMConexaoBancoDados();
        $objIMConexaoBancoDados->conectarMysql( $objIMConexaoAtributos );

        return $objIMConexaoBancoDados;
    }

}
?>