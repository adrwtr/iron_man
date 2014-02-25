<?
/**
 * Retorna a conexao com a base local
 */
require_once(C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php');
require_once(C_PATH_CLASS . 'banco_dados/IMConexaoAtributos.class.php');

class ConexaoLocal {

    function __construct(){}

    /**
     * Retorna a conexao com a base local
     *
     * @return IMConexaoBancoDados
     */
    function getConexao()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco("unimestre_horus_branco");
        $objIMConexaoAtributos->setLogin("backup");
        $objIMConexaoAtributos->setSenha("");
        $objIMConexaoAtributos->setBanco("unimestre_horus_branco");
        $objIMConexaoAtributos->setHost("localhost");
        $objIMConexaoAtributos->setPorta("");

        $objIMConexaoBancoDados = new IMConexaoBancoDados();
        $objIMConexaoBancoDados->conectarMysql( $objIMConexaoAtributos );

        return $objIMConexaoBancoDados;
    }

}
?>