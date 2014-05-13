<?
namespace info_data\base;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;
use imclass\banco_dados\IMConexaoBancoDadosPDO;

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

      $objIMConexaoBancoDados = new IMConexaoBancoDadosPDO();

      $objIMConexaoBancoDados->conectar( $objIMConexaoAtributos );
      
      return $objIMConexaoBancoDados;
    }

}
?>