<?php
namespace imclass\entidades\internos\execucoes;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* IMExecucoes
*/
class IMExecucoes
{
   /**
    * @var integer
    */
   private $cd_execucao;

   /**
    * @var string
    */
   private $ds_nome_classe;

   /**
    * @var string
    */
   private $ds_path_classe;

   /**
    * @var valor
    */
   private $ds_valor;

   /**
    * @var \DateTime
    */
   private $dt_execucao;

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
    * Get cd_execucao
    *
    * @return integer 
    */
   public function setCdExecucao( $cd_execucao)
   {
      $this->cd_execucao = $cd_execucao;
      return $this;
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
    * Set ds_valor
    *
    * @param string $dsValor
    * @return IMExecucoes
    */
   public function setDsValor($dsValor)
   {
      $this->ds_valor = $dsValor;

      return $this;
   }

   /**
    * Get ds_valor
    *
    * @return string 
    */
   public function getDsValor()
   {
      return $this->ds_valor;
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

   /**
    * retorna o array de execuções parametros
    * @return array of execucoes parametros
    */
   public function getExecucoesParametros()
   {
      return $this->arrExecucoesParametros;
   }     
}
