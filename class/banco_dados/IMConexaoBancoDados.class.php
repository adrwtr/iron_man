<?
require_once( C_PATH_CLASS .'base/IMErro.class.php' );
require_once( C_PATH_CLASS .'php/IMPDOStatement.class.php' );

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
    * @return [IMPDOStatement] [IMErro]
    */
   public function conectarMysql( $objIMConexaoAtributos=null )
   {    
      try 
      {  
         if ( $objIMConexaoAtributos != null )
         {
            $this->objPDO = new PDO( 
               $objIMConexaoAtributos->getPDOMysqlString(), 
               $objIMConexaoAtributos->getLogin(), 
               $objIMConexaoAtributos->getSenha() 
            );
            
            $this->isConnected = true;

            return true;
         }

         return false;
      } 
      catch ( PDOException $e ) 
      {         
         $objIMErro = new IMErro("Connection failed:");
         $objIMErro->set( 'Connection failed: ' . $e->getMessage() );
         vl($e->getMessage() );
         vl('Erro de Conexão Mysql');
         die();
         return $objIMErro;
      }
   }

   /**
    * Executa a query e retorna resultado
    * 
    * @param  string $query      [description]
    * @return [IMPDOStatement]   [IMPDOStatement]
    */
   public function query( $query='' )
   {
      if ( $this->isConnected )
      {
         $objPDOStatement = $this->objPDO->prepare( $query );
         $objPDOStatement->execute();

         return new IMPDOStatement( $objPDOStatement );
      }
   }

   /**
    * Apenas executa a query 
    * 
    * @param  string $query [description]
    * @return [type]        [quantos registros alterados]
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

   public function getLastInsertId()
   {
      return $this->objPDO->lastInsertId();
   }

}
?>