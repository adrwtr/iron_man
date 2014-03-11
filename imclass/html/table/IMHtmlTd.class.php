<?php
/**
 * Classe que simula uma td
 */
class IMHtmlTd {

   private $valor;
   private $attr;


   function __construct()
   {
   }

   /**
    * seta o valor da coluna
    *
    * @param mixed $valor
    */
   public function setValor( $valor )
   {
      $this->valor = $valor;
   }

   /**
    * @return mixed
    */
   public function getValor()
   {
      return $this->valor;
   }


   /**
    * seta os atributos
    *
    * @param mixed $str_attr
    */
   public function setAttr( $str_attr='' )
   {
      $this->attr = $attr;
   }

   /**
    * @return mixed
    */
   public function getAttr()
   {
      return $this->attr;
   }

   public function getHTML()
   {

   }
}