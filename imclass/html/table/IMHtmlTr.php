<?php
namespace imclass\html\table;

include( 'IMHtmlTd.class.php' );

/**
 * Classe que simula uma tr
 */
class IMHtmlTr {

   private $arrIMHtmlTdList;

   /**
    * @return mixed
    */
   public function getArrIMHtmlTdList()
   {
      return $this->arrIMHtmlTdList;
   }

   /**
    * @param mixed $arrObjIMHtmlTd
    */
   public function setArrIMHtmlTdList( $arrIMHtmlTdList )
   {
      $this->arrIMHtmlTdList = $arrIMHtmlTdList;
   }

   /**
    * Adiciona uma nova td
    *
    * @param $objIMHtmlTd
    */
   public function addTD( $objIMHtmlTd=null )
   {
      if ( $objIMHtmlTd == null )
      {
         $this->arrIMHtmlTdList[] = new IMHtmlTd();
      }
      else
      {
         $this->arrIMHtmlTdList[] = $objIMHtmlTd;
      }
   }


}