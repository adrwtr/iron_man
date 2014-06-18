<?php
namespace imclass\imphp;

/**
 * Camada para as operações de reflection do php
 */
class IMReflection{

   private $objReflectionClass;
   private $objOriginal;
   
   public function __construct( $obj )
   {
      $this->objOriginal = $obj;
      $this->setobjReflectionClass( $obj );
   }

   public function setobjReflectionClass( $obj=null )
   {
      $this->objReflectionClass = new \ReflectionClass( $obj );      
   }

   public function getobjReflectionClass()
   {
      return $this->objReflectionClass;
   }

   public function getName()
   {
      return $this->getobjReflectionClass()->getName();
   }

   public function getNome()
   {
      return $this->getName();
   }

   /**
    * Retorna os atributos de uma classe
    * 
    * @return array
    */
   public function getAtributos()
   {      
      $arrReturn = array();

      $arrAtributos = $this->getobjReflectionClass()->getProperties(
         \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED
      );

      if ( is_array( $arrAtributos) )
      {         
         foreach ( $arrAtributos as $key => $value) 
         {
            $nome    = $value->getName();
            $valor   = $this->getobjReflectionClass()->getProperty( $nome )->getValue( $this->objOriginal );

            $arrReturn[ $nome ] = $valor;
         }
      }

      return $arrReturn;
   }

   public function getMetodos()
   {
      $arrMetodosOriginais = $this->getobjReflectionClass()->getMethods();
      $arrMetodos          = array();

      if ( is_array( $arrMetodosOriginais) )
      {         
         foreach ( $arrMetodosOriginais as $key => $value) 
         {
            $nome              = $value->getName();
            $arrParametros     = array();
            $arrParamOriginais = $value->getParameters();

            if ( is_array($arrParamOriginais) )
            {
               foreach ( $arrParamOriginais as $param_id => $param_v ) 
               {
                  $arrParametros[] = $param_v->getName();
               }
            }

            $arrMetodos[ $nome ] = $arrParametros;
         }
      }
      
      return $arrMetodos;
   }
}
?>