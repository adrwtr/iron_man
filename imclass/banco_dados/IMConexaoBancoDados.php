<?php
namespace imclass\banco_dados;

use imclass\banco_dados\IMConexaoAtributos;
use imclass\base\IMErro;
use imclass\imphp\IMPDOStatement;

/**
 * Classe que representa uma conexão PDO com o banco de dados
 * Abstração de banco de dados
 */
class IMConexaoBancoDados {
   
   private $objPDO;
   private $isConnected;

   public function __construct()
   {
      $this->objPDO        = null;
      $this->isConnected   = false;
   }

   /**
    * Conecta com mysql
    *
    * @param  [IMConexaoAtributos] $objIMConexaoAtributos [Atributos de conexao]
    * @return bool [IMPDOStatement] [IMErro]
    */
   public function conectarMysql( IMConexaoAtributos $objIMConexaoAtributos=null )
   {    
      try 
      {  
         if ( $objIMConexaoAtributos != null )
         {
            $this->objPDO = new \PDO( 
               $objIMConexaoAtributos->getPDOMysqlString(), 
               $objIMConexaoAtributos->getLogin(), 
               $objIMConexaoAtributos->getSenha() 
            );
            
            $this->setIsConnected(true);                        
            return true;
         }

         return false;
      } 
      catch ( \PDOException $e ) 
      {   
         // vl($e->getMessage());
         $this->setIsConnected(false);          
              
         return false;               
      }      
   }

   /**
    * Executa a query e retorna resultado
    * 
    * @param  string $query      [description]
    * @return [IMPDOStatement ou bool]   [IMPDOStatement]
    */
   public function query( $query='' )
   {
      if ( $this->isConnected )
      {         
         $objPDOStatement = $this->objPDO->prepare( $query );
         $objPDOStatement->execute();

         return new IMPDOStatement( $objPDOStatement );
      }

      return false;
   }

   /**
    * Apenas executa a query 
    * 
    * @param  string $query [description]
    * @return [int]         [quantos registros alterados]
    */
   public function executa( $query='' )
   {
      if ( $this->isConnected )
      {        
         $contador = $this->objPDO->exec( $query );
         
         return $contador;
      }

      return 0;
   }

   /**
    * Retorna o último id inserido
    * @return int
   */
   public function getLastInsertId()
   {
      if ( $this->objPDO != null )
      {
        return $this->objPDO->lastInsertId();
      }

      return null;
   }

   /**
    * Indica se está conectado
    * @return boolean
    */
   public function getIsConnected()
   {
      return $this->isConnected;
   }

   /**
    * Seta se está conectado
    * @param boolean $isConnected
    */
   public function setIsConnected( $isConnected )
   {
      $this->isConnected = $isConnected;
   }

}
?>