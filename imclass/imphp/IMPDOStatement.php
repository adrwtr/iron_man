<?
namespace imclass\imphp;

/**
 * Implementaчуo para a classe PDOStatement
 */
class IMPDOStatement{
   
   private $arrValores;
   private $ehValido;

   /**
    * Recebe um objeto padrуo do PHP que trata o statement do PDO
    * Jс inicia o array interno da classe com os valores do resultado obtido pelo sql
    * @param [ PDOStatement] $objSt 
    */
   public function __construct(  \PDOStatement $objSt=null )
   {
      $this->setArrValores( $objSt );
      return $this;
   }

   /**
    * Inicia o array de valores corretamente 
    * @param [ PDOStatement] $obj [description]
    * @return  bool [caso deu certo]
    */
   public function setArrValores(  \PDOStatement $objSt=null )
   {
      $this->ehValido = false;  

      if ( $objSt != null )
      {
         try 
         {        
            $this->arrValores = $objSt->fetchAll( \PDO::FETCH_ASSOC );                    
            $this->ehValido   = true;
            $objSt->closeCursor();

            return true;
         }
         catch( \Exception $e )
         {              
            $this->ehValido = false; 
            // $e->getMessage();                      
         }
      }

      $this->ehValido = false;

      return false;
   }

   /**
    * Retorna um array com todos os valores do sql
    * @return [array] [valores do sql]
    */
   public function getArrValores()
   {
      return $this->arrValores;
   }

   /**
    * Indica se o stantment щ/foi valido
    * @return [bool] 
    */
   public function ehValido()
   {
      return $this->ehValido != false;
   }
}
?>