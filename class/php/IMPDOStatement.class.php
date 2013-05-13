<?
require_once( C_PATH_CLASS .'base/IMErro.class.php' );
require_once( C_PATH_CLASS .'banco_dados/IMTabela.class.php' );
require_once( C_PATH_CLASS .'banco_dados/IMResultado.class.php' );

class IMPDOStatement{
   
   private $arrValores;
   private $ehValido;

   public function __construct( $obj=null )
   {
      $this->setArr( $obj );
   }

   public function setArr( $obj=null )
   {
      if ( $obj != null )
      {
         try 
         {            
            $objPDOStatement  = $obj;         
            $this->arrValores = $objPDOStatement->fetchAll();                    
            $this->ehValido   = true;

            $objPDOStatement->closeCursor();
            return true;
         }
         catch( Exception $e )
         {         
            $this->ehValido = false;
            $objIMErro = new IMErro();
            $objIMErro->set( 'Erro ao tentar ler dados do statement: ' . $e->getMessage() );
            return $objIMErro;
         }
      }

      $this->ehValido = false;

      return false;
   }

   public function getArr()
   {
      return $this->arrValores;
   }

   public function getArrValores()
   {
      return $this->getArr();
   }

   public function ehValido()
   {
      return $this->ehValido != false;
   }

   /**
    * Converte o resultado para um Resultado
    * 
    * @return IMResultado [description]
    */
   public function toIMResultado()
   {
      if ( $this->ehValido() )
      {
         foreach ( $this->getArr() as $key => $value ) 
         {            
            foreach ( $value as $indice => $valor ) 
            {
               if ( ! is_numeric($indice) )
               {
                  $arr[$key][ $indice] = $valor;
               }
            }
         }  

         $objIMResultado = new IMResultado();
         $objIMResultado->set( $arr );
         
         return $objIMResultado;
      } 

      return false;
   }



}
?>