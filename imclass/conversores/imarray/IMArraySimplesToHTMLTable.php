<?php
namespace imclass\conversores\imarray;

use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

/**
 * Classe responsável pro converter arrays Simples em tabelas htmls
 */
class IMArraySimplesToHTMLTable {

   /**
    * Converte um array em uma tabela e imprime os valores na horizontal
    * Os indices são impressos acima, e a lista de valores uma abaixo da outra
    * O array precisa ser bidimensional
    * 
    * @param  [array] $arr [description]
    * @return IMHtmlTable     
    */
   public function convertTabelaHorizontal( $arr )
   {
      $objIMHtmlTable = new IMHtmlTable();

      // linha principal
      $objIMHtmlTr = new IMHtmlTr();

      foreach ($arr as $key => $value) 
      {
         $objIMHtmlTd = new IMHtmlTd();      
         $objIMHtmlTd->setValor( $key );      
         $objIMHtmlTr->addTd( $objIMHtmlTd );   
      }

      $objIMHtmlTable->addTr( $objIMHtmlTr );

      // valores
      $objIMHtmlTr = new IMHtmlTr();
      foreach ($arr as $key => $value) 
      {
         $objIMHtmlTd = new IMHtmlTd();      
         $objIMHtmlTd->setValor( $value );      
         $objIMHtmlTr->addTd( $objIMHtmlTd );   
      }

      $objIMHtmlTable->addTr( $objIMHtmlTr );
            
      return $objIMHtmlTable;
   }


   /**
    * Converte um array em uma tabela e imprime os valores na vertical
    * Os indices são impressos na esquerda, e a lista de valores na direita
    * O array precisa ser bidimensional
    * @param  [array] $arr [description]
    * @return [str]     
    */
   public function convertTabelaVertical( $arr )
   {
      $objIMHtmlTable = new IMHtmlTable();

      foreach( $arr as $key_id => $key_v )
      {
         $objIMHtmlTr = new IMHtmlTr();

         $objIMHtmlTd = new IMHtmlTd();      
         $objIMHtmlTd->setValor( $key_id );      
         $objIMHtmlTr->addTd( $objIMHtmlTd );

         $objIMHtmlTd = new IMHtmlTd();      
         $objIMHtmlTd->setValor( $key_v );      
         $objIMHtmlTr->addTd( $objIMHtmlTd );   

         $objIMHtmlTable->addTr( $objIMHtmlTr );
      }      

      return $objIMHtmlTable;
   }
}
?>