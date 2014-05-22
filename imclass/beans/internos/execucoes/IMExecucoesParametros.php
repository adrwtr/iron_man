<?php
namespace imclass\beans\internos\execucoes;

use Doctrine\ORM\Mapping as ORM;

/**
* IMExecucoes
*/
class IMExecucoesParametros
{
   /**
    * @var integer
    */
   private $cd_parametro;

   /**
    * @var string
    */
   private $ds_nome;

   /**
    * @var string
    */
   private $ds_valor;

   /**
    * qual a execucao desse parametro
    * @var imclass\beans\internos\execucoes\IMExecucoes
    */
   private $objIMExecucoes;

   /**
    * Todos os parametros utilizados na execução
    * @var \ArrayCollection
    */
   private $arrExecucoesParametros;

   public function __construct()
   {
      $this->arrExecucoesParametros = new ArrayCollection();
   }

   /**
    * Get cd_execucao
    *
    * @return integer 
    */
   public function getCdExecucao()
   {
      return $this->cd_execucao;
   }

   /**
    * Set ds_nome_classe
    *
    * @param string $dsNomeClasse
    * @return IMExecucoes
    */
   public function setDsNomeClasse($dsNomeClasse)
   {
      $this->ds_nome_classe = $dsNomeClasse;

      return $this;
   }

   /**
    * Get ds_nome_classe
    *
    * @return string 
    */
   public function getDsNomeClasse()
   {
      return $this->ds_nome_classe;
   }

   /**
    * Set ds_path_classe
    *
    * @param string $dsPathClasse
    * @return IMExecucoes
    */
   public function setDsPathClasse($dsPathClasse)
   {
      $this->ds_path_classe = $dsPathClasse;

      return $this;
   }

   /**
    * Get ds_path_classe
    *
    * @return string 
    */
   public function getDsPathClasse()
   {
      return $this->ds_path_classe;
   }

   /**
    * Set dt_execucao
    *
    * @param \DateTime $dtExecucao
    * @return IMExecucoes
    */
   public function setDtExecucao($dtExecucao)
   {
      $this->dt_execucao = $dtExecucao;

      return $this;
   }

   /**
    * Get dt_execucao
    *
    * @return \DateTime 
    */
   public function getDtExecucao()
   {
      return $this->dt_execucao;
   }


   /**
    * Adiciona um parametro
    * @param IMExecucoesParametros $objIMExecucoesParametros
    */
   public function addExecucaoParametro( IMExecucoesParametros $objIMExecucoesParametros )
   {
      $this->arrExecucoesParametros[] = $objIMExecucoesParametros;
      return $this;
   }
}
