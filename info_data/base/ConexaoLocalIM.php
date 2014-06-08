<?
namespace info_data\base;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;
use imclass\banco_dados\IMConexaoBancoDadosPDO;

/**
 * Retorna a conexao com a base local
 */
class ConexaoLocalIM {

   /**
    * Retorna a conexao com a base local
    *
    * @return IMConexaoBancoDados
    */
   function getConexao()
   {
      $objIMConexaoBancoDados = new IMConexaoBancoDadosPDO();

      $objIMConexaoBancoDados->conectar( 
         $this->getIMConexaoAtributos()
      );

      return $objIMConexaoBancoDados;
   }

   function getIMConexaoAtributos()
   {
      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("localhost");
      $objIMConexaoAtributos->setLogin("moodle");
      $objIMConexaoAtributos->setSenha("moodle");
      $objIMConexaoAtributos->setBanco("adriano");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");   

      return $objIMConexaoAtributos;
    }

}
?>