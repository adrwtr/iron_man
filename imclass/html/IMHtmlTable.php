<?php
namespace imclass\html;

/**
 * Classe que simula uma tabela
 */
class IMHtmlTable {

   private $attr;
   private $arrIMHtmlTrList;

   function __construct()
   {
   }

   /**
    * @param mixed $arrObjIMHtmlTr
    */
   public function setArrIMHtmlTrList( $arrObjIMHtmlTr )
   {
      $this->arrIMHtmlTrList = $arrObjIMHtmlTr;
   }

   /**
    * @return mixed
    */
   public function getArrIMHtmlTrList()
   {
      return $this->arrIMHtmlTrList;
   }

   /**
    * @param mixed $attr
    */
   public function setAttr( $attr )
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

   /**
    * Adiciona uma linha
    */
   public function addTr( $objIMHtmlTr=null )
   {
      if ( $objIMHtmlTr == null )
      {
         $this->arrIMHtmlTrList[] = new IMHtmlTr();
      }
      else
      {
         $this->arrIMHtmlTrList[] = $objIMHtmlTr;
      }
   }



}