<?
namespace imclass\apps;

use imclass\apps\iAppInterface;
use imclass\apps\link\LinkCampo;

/**
 * Classe concreta base que implementa a base de uma interface
 * Nao usar esta classe, ela deve ser extendida - representa uma aplicacao
 */
class AppConcreto implements iAppInterface { 

   // descricao da aplicacao
   var $str_descricao;

   // campos utilizados pela aplicacao
   var $arrInputs;

   // valores atribuidos aos campos
   var $arrInputsValores;

   // campos que podem ser linkados a esta aplicacao
   var $arrCamposLinkados;

   // campos que podem ser retornados
   var $arrRetornosLinkados;

   /**
    * Seta a descricao da classe
    * @param string $str_descricao [description]
    */
   public function setDescricao( $str_descricao='' )
   {
      $this->str_descricao = $str_descricao;
   }  

   /**
    * Retorna a descricao da classe
    * @return [str]
    */
   public function getDescricao()
   {
      return $this->str_descricao;   
   }


   /**
    * seta o nome de um input
    * @param [str] $nome
    */
   public function setInput( $nome )
   {      
      $this->arrInputs[] = $nome;
   }

   /**
    * Retorna todos os inputs poss?vels
    * @return [array] 
    */
   public function getArrInputs()
   {      
      return $this->arrInputs;
   }


   /**
    * Seta valor de um input
    * @param [str] $nome  [description]
    * @param [str] $valor [description]
    */
   public function setInputValor( $nome, $valor )
   {
      $this->arrInputsValores[$nome] = $valor;
   }

   /**
    * Recupera um valor de um input
    * @param  [type] $nome [description]
    * @return [type]       [description]
    */
   public function getInputValor( $nome )
   {
      return $this->arrInputsValores[ $nome ];
   }

   /**
    * Deve ser criado nas classes extendidas
    * @return [type] [description]
    */
   public function executar()
   {
      return null;
   }


   /**
    * toda classe app pode ter campos linkados
    */
   public function setCamposLinkados( LinkCampo $objLinkCampo )
   {
      $this->arrCamposLinkados[] = $objLinkCampo;
   }

   /**
    * toda classe app pode retornar um valor para um campo linkado
    */
   public function setRetornosLinkados( LinkCampo $objLinkCampo )
   {
      $this->arrRetornosLinkados[] = $objLinkCampo;
   }

   public function getLinkCampos()
   {
      
   }

   public function getLinkRetornos()
   {
      
   }
}
?>