<?
namespace imclass\uteis\base;

use imclass\apps\inputs\InputConexoesMysql;

/**
 * Classe utilitaria que ajuda a recuperar uma classe
 * de conexão enviando um nome por string
 */
class IMGetConexaoBancoFromNome {

   /**
    * Retorna uma conexão ativa baseado no nome da classe
    * @param  [str] $nm_classe [description]
    * @return [IMConexaoBancoDados]            [objeto construido e conectado]
    */
   public static function getConexao( $nm_classe )
   {
      $objInputConexoesMysql = new InputConexoesMysql();      
      
      $class = IMGetConexaoBancoFromNome::arrumaClasse( 
         $objInputConexoesMysql->getDirConexoes() . $nm_classe 
      );      

      $objInterface = new $class;
      
      $objIMConexaoBancoDados = $objInterface->getConexao();

      if ( $objIMConexaoBancoDados->getIsConnected() == true )
      {
         return $objIMConexaoBancoDados;
      }

      return null;
   }   

   /**
    * Tira o .class.php do nome da classe
    * @param  [str] $valor [nome da classe]
    * @return [str]
    */
   public static function arrumaClasse( $valor )
   {      
      $valor = str_replace( '.php', '', $valor ); 
      $valor = str_replace( '../', '', $valor ); 
      return str_replace( '/', '\\', $valor ); 
   }   
}
