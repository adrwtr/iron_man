<?php
namespace imclass\banco_dados;

use imclass\banco_dados\IMConexaoAtributos;

/**
 * Classe que representa uma conexão mysql simples com o banco de dados
 * Abstração de banco de dados
 */
class IMConexaoBancoDadosMysqli implements iConexaobancoDados {
   
   private $isConnected;
   private $mensagem_erro;
   private $objMysqli;

   /**
    * Conecta com mysql
    *
    * @param  [IMConexaoAtributos] $objIMConexaoAtributos [Atributos de conexao]
    * @return bool [IMPDOStatement] [IMErro]
    */
   public function conectar( IMConexaoAtributos $objIMConexaoAtributos=null )
   {    
      $this->setIsConnected(false);

      try 
      {  
         if ( $objIMConexaoAtributos != null )
         {
            $this->objMysqli = mysql_connect(  
               $objIMConexaoAtributos->getHost(), 
               $objIMConexaoAtributos->getLogin(),
               $objIMConexaoAtributos->getSenha(),
               $objIMConexaoAtributos->getBanco() 
            );

            mysql_select_db( $objIMConexaoAtributos->getBanco() );
           
            $this->setIsConnected(true);                                    
            return true;
         }         
      } 
      catch ( \Exception $e ) 
      {        
         $this->setMensagemErro($e->getMessage());
         $this->setIsConnected(false);         
      }   

      return false;   
   }

   /**
    * Executa a query e retorna resultado
    * 
    * @param  string $query      [description]
    * @return [array] 
    */
   public function query( $query='' )
   {
      if ( $this->getIsConnected() )
      {  
         try
         {
            $resultado = mysql_query( $query, $this->objMysqli );            

            while ($valores = mysql_fetch_assoc($resultado)) 
            {
               $arrValores[] = $valores;
            }

            return $arrValores;                      
         }
         catch( \Exception $e )
         {
            $this->setMensagemErro( $e->getMessage() );
         }
      }

      return false;
   }

   /**
    * Apenas executa a query 
    * 
    * @param  string $query [description]
    * @return [int]         [quantos registros alterados]
    */
   public function executar( $query='' )
   {
      if ( $this->isConnected )
      {        
         $resultado = mysql_query( $query, $this->objMysqli );                  
         return mysql_affected_rows();         
      }

      return 0;
   }

   /**
    * Retorna o último id inserido
    * @return int
   */
   public function getLastInsertId()
   {
      if ( $this->getIsConnected() )
      {
         $q = "select last_insert_id() as id";
         $arrValores = $this->query( $q, $this->objMysqli );         
                  
         return $arrValores[0]['id'];
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

   /**
    * Tem mensagem de erro? Qual é?
    * @return string
    */
   public function getMensagemErro()
   {
      return $this->mensagem_erro;
   }

   /**
    * Seta a mensagem de erro
    * @param string
    */
   public function setMensagemErro( $valor='' )
   {
      $this->mensagem_erro = $valor;
   }
}
?>