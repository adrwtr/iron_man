<?php
namespace imclass\html;

use imclass\html\table\IMHtmlTr;

/**
 * Classe que simula uma tabela do html
 */
class IMHtmlTable {

   /**
    * Atributos da tabela
    * @var str
    */
   private $attr;

   /**
    * Linhas da tabela
    * @var [type]
    */
   private $arrObjIMHtmlTrList;

   
   /**
    * Seta todo o array
    * @param mixed $arrObjIMHtmlTr
    */
   public function setArrIMHtmlTrList( $arrObjIMHtmlTrListTemp )
   {
      $this->arrObjIMHtmlTrList = $arrObjIMHtmlTrListTemp;
   }

   /**
    * Recupera todas as linhas
    * @return mixed
    */
   public function getArrIMHtmlTrList()
   {
      return $this->arrObjIMHtmlTrList;
   }

   /**
    * Seta os atributos
    * @param mixed $attr
    */
   public function setAttr( $attr )
   {
      $this->attr = $attr;
   }

   /**
    * Recupera os atributos
    * @return mixed
    */
   public function getAttr()
   {
      return $this->attr;
   }

   /**
    * Adiciona uma linha
    * @return  this
    */
   public function addTr( IMHtmlTr $objIMHtmlTr=null )
   {
      if ( $objIMHtmlTr == null )
      {
         $this->arrObjIMHtmlTrList[] = new IMHtmlTr();
      }
      else
      {
         $this->arrObjIMHtmlTrList[] = $objIMHtmlTr;
      }

      return $this;
   }

   /**
    * retorna se tem alguma linha definida - tr
    * @return bool
    */
   public function temLinhas()
   {
      return (count($this->arrObjIMHtmlTrList) > 0);
   }

   /**
    * Retorna o html
    * @return [type] [description]
    */
   public function getHTML()
   {
      $html = '';
      
      $html = "<table ". $this->getAttr() .">\n";
      
      if ( $this->temLinhas() )
      {
         foreach ( $this->getArrIMHtmlTrList() as $key => $objIMHtmlTr ) 
         {
            $html .= $objIMHtmlTr->getHTML();
         }      
      }

      $html .= "</table>\n";

      return $html;
   }
}