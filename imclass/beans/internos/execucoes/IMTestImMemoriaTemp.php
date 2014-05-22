<?php
namespace imclass\beans\internos\execucoes;

use Doctrine\ORM\Mapping as ORM;

/**
* IMTestImMemoriaTemp
*/
class IMTestImMemoriaTemp
{
   /**
   * @var integer
   */
   private $id;

   /**
   * @var string
   */
   private $ds_descricao;

   /**
   * @var string
   */
   private $ds_classe;    

   /**
   * @var string
   */
   private $ds_parametros;

   /**
   * @var \DateTime
   */
   private $dt_cadastro;

   /**
    * Get id
    *
    * @return integer 
    */
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set id
    *
    * @param string $id
    * @return IMExecucoes
    */
   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }

   /**
    * Get ds_descricao
    *
    * @return string 
    */
   public function getDsDescricao()
   {
      return $this->ds_descricao;
   }

   /**
    * Set ds_descricao
    *
    * @param string $dsPathClasse
    * @return IMExecucoes
    */
   public function setDsDescricao($ds_descricao)
   {
      $this->ds_descricao = $ds_descricao;

      return $this;
   }

   /**
    * Get ds_classe
    *
    * @return string 
    */
   public function getDsClasse()
   {
      return $this->ds_classe;
   }

   /**
    * Set ds_classe
    *
    * @param str $ds_classe
    * @return IMExecucoes
    */
   public function setDsClasse($ds_classe)
   {
      $this->ds_classe = $ds_classe;

      return $this;
   }

   /**
    * Set dt_cadastro
    *
    * @param \DateTime $dtcadastro
    * @return IMExecucoes
    */
   public function setDtcadastro($dtcadastro)
   {
      $this->dt_cadastro = $dtcadastro;

      return $this;
      }

   /**
    * Get dt_cadastro
    *
    * @return \DateTime 
    */
   public function getDtcadastro()
   {
      return $this->dt_cadastro;
   }
}