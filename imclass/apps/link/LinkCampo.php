<?
namespace imclass\apps\link;


/**
 * Estrutura padrao de um campo linkado
 */
class LinkCampo { 

   private $objBase;
   private $nome_campo;
   private $tipo;

   public function __construct( $objBase, $nome_campo, $tipo )
   {
      $this->setObjBase( $objBase );
      $this->setNomeCampo( $nome_campo );
      $this->setTipo( $tipo );
   }


   /**
    * Gets the value of objBase.
    *
    * @return mixed
    */
   public function getObjBase()
   {
     return $this->objBase;
   }

   /**
    * Sets the value of objBase.
    *
    * @param mixed $objBase the obj base    *
    * @return self
    */
   public function setObjBase($objBase)
   {
     $this->objBase = $objBase;

     return $this;
   }

   /**
    * Gets the value of nome_campo.    *
    * @return mixed
    */
   public function getNomeCampo()
   {
     return $this->nome_campo;
   }

   /**
    * Sets the value of nome_campo.
    *
    * @param mixed $nome_campo the nome_campo    *
    * @return self
    */
   public function setNomeCampo($nome_campo)
   {
     $this->nome_campo = $nome_campo;

     return $this;
   }

   /**
    * Gets the value of tipo.
    *
    * @return mixed
    */
   public function getTipo()
   {
     return $this->tipo;
   }

   /**
    * Sets the value of tipo.
    *
    * @param mixed $tipo the tipo
    *
    * @return self
    */
   public function setTipo($tipo)
   {
     $this->tipo = $tipo;

     return $this;
   }
}
?>