<?
namespace imclass\apps\link;


/**
 * Estrutura padrao de um campo linkado
 */
class LinkCampo { 

   private $ds_nome_classe;
   private $ds_path_classe;
   private $ds_nome_campo;
   private $ds_tipo_retorno;

   public function __construct( 
      $ds_nome_classe, 
      $ds_path_classe,
      $ds_nome_campo, 
      $ds_tipo_retorno 
   )
   {
      $this->setDsNomeClasse( $ds_nome_classe );
      $this->setDsPathClasse( $ds_path_classe );
      $this->setDsNomeCampo( $ds_nome_campo );
      $this->setDsTipoRetorno( $ds_tipo_retorno );

   }
   
   /**
    * Retorna nome da classe
    *
    * @return string
    */
   public function getDsNomeClasse()
   {
      return $this->ds_nome_classe;
   }

   /**
    * Sets the value of ds_nome_classe.
    *
    * @param mixed $ds_nome_classe the ds_nome_classe
    *
    * @return self
    */
   public function setDsNomeClasse($ds_nome_classe)
   {
      $this->ds_nome_classe = $ds_nome_classe;

      return $this;
   }

   /**
    * Gets the value of ds_path_classe.
    *
    * @return mixed
    */
   public function getDsPathClasse()
   {
      return $this->ds_path_classe;
   }

   /**
    * Sets the value of ds_path_classe.
    *
    * @param mixed $ds_path_classe the ds_path_classe
    *
    * @return self
    */
   public function setDsPathClasse($ds_path_classe)
   {
      $this->ds_path_classe = $ds_path_classe;

      return $this;
   }

   /**
    * Gets the value of ds_nome_campo.
    *
    * @return mixed
    */
   public function getDsNomeCampo()
   {
      return $this->ds_nome_campo;
   }

   /**
    * Sets the value of ds_nome_campo.
    *
    * @param mixed $ds_nome_campo the ds_nome_campo
    *
    * @return self
    */
   public function setDsNomeCampo($ds_nome_campo)
   {
      $this->ds_nome_campo = $ds_nome_campo;

      return $this;
   }

   /**
    * Gets the value of ds_tipo_retorno.
    *
    * @return mixed
    */
   public function getDsTipoRetorno()
   {
      return $this->ds_tipo_retorno;
   }

   /**
    * Sets the value of ds_tipo_retorno.
    *
    * @param mixed $ds_tipo_retorno the ds_tipo_retorno
    *
    * @return self
    */
   public function setDsTipoRetorno($ds_tipo_retorno)
   {
      $this->ds_tipo_retorno = $ds_tipo_retorno;

      return $this;
   }  
}
?>