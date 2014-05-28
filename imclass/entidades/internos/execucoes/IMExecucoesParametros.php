<?php
namespace imclass\entidades\internos\execucoes;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe que representa os parametros utilizados em uma execução
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
   private $cd_execucao;


   /**
    * Get cd_parametro
    *
    * @return integer 
    */
   public function getCdParametro()
   {
      return $this->cd_parametro;
   }

   /**
    * Chave primaria
    * @param [int] $cd_parametro [int]
    */
   public function setCdParametro( $cd_parametro )
   {
      $this->cd_parametro = $cd_parametro;
      return $this;
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
    * Seta a execução
    * @param [int] $cd_execucao [int]
    */
   public function setCdExecucao( $cd_execucao )
   {
      $this->cd_execucao = $cd_execucao;
      return $this;
   }

   /**
    * Set ds_nome
    *
    * @param string $dsNome
    * @return IMExecucoes
    */
   public function setDsNome($ds_nome)
   {
      $this->ds_nome = $ds_nome;

      return $this;
   }

   /**
    * Get ds_nome_classe
    *
    * @return string 
    */
   public function getDsNome()
   {
      return $this->ds_nome;
   }

   /**
    * Set ds_valor
    *
    * @param string $dsNome
    * @return IMExecucoesParametros
    */
   public function setDsValor($ds_valor)
   {
      $this->ds_valor = $ds_valor;

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
}
