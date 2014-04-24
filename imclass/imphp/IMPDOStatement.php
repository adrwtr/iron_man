<?
namespace imclass\imphp;

use imclass\base\IMErro;

/**
 * Implementa��o para a classe PDOStatement
 */
class IMPDOStatement{
   
   private $arrValores;
   private $ehValido;

   /**
    * Recebe um objeto padr�o do PHP que trata o statement do PDO
    * J� inicia o array interno da classe com os valores do resultado obtido pelo sql
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
      if ( $objSt != null )
      {
         try 
         {        
            $this->arrValores = $objSt->fetchAll();                    
            $this->ehValido   = true;
            $objSt->closeCursor();

            return true;
         }
         catch( \Exception $e )
         {         
            $this->ehValido = false;
            $objIMErro      = new IMErro();
            $objIMErro->set( 
               'Erro ao tentar ler dados do statement: ' . $e->getMessage() 
            );
            echo $objIMErro->get();
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
    * Indica se o stantment �/foi valido
    * @return [bool] 
    */
   public function ehValido()
   {
      return $this->ehValido != false;
   }
}
?>