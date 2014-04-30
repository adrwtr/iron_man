<?php
namespace imclass\conversores;

use imclass\html\IMHtmlTable;
use imclass\html\table\IMHtmlTr;
use imclass\html\table\IMHtmlTd;

/**
 * Classe responsável pro converter arrays em tabelas htmls
 */
class IMArrayToHTMLTable {

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
      $varios_itens   = false;
      $objIMHtmlTable = new IMHtmlTable();

      // linha principal
      $objIMHtmlTr = $this->getLinhaTopo( $arr ); 
      $objIMHtmlTable->addTr( $objIMHtmlTr );

      // linhas de valores   
      if ( $this->verificaBidimensional($arr) == true )
      {
         $varios_itens = true;

         foreach ($arr as $key => $value) 
         {
            $objIMHtmlTr = new IMHtmlTr();
            $objIMHtmlTr = $this->getLinhaValor( $arr, $key );
            $objIMHtmlTable->addTr( $objIMHtmlTr );
         }   
      }

      // se tiver uma linha soh 
      if ( $varios_itens == false )
      {
         $objIMHtmlTr = new IMHtmlTr();
         $objIMHtmlTr = $this->getLinhaValor( $arr, $key );
         $objIMHtmlTable->addTr( $objIMHtmlTr );
      }
      
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
      $varios_itens   = false;
      $objIMHtmlTable = new IMHtmlTable();

      if ( $this->verificaBidimensional($arr) == true )
      {

         $varios_itens  = true;
         $linha_atual   = 0;
         $coluna_atual  = 0;

         
         foreach ($arr as $principal_id => $principal_v ) 
         {            
            // leitura de todas as colunas
            if ( $linha_atual == 0 )
            {
               foreach ( $principal_v as $key => $v) 
               {
                  $arrColunas[] = $key;
               }
               
               $linha_atual++;
            }
         
            // linhas
            foreach ( $principal_v as $key => $v) 
            {               
               $arrLinhas[] = $v;
            }
         }
         
         // imprime colunas
         $objIMHtmlTr = new IMHtmlTr();
         foreach ( $arrColunas as $key => $value ) 
         {
            $objIMHtmlTd = new IMHtmlTd();      
            $objIMHtmlTd->setValor( $value );      
            $objIMHtmlTr->addTd( $objIMHtmlTd );
         }
         $objIMHtmlTable->addTr( $objIMHtmlTr );

         // linhas
         $total_colunas = count($arrColunas);
         $objIMHtmlTr = new IMHtmlTr();
                foreach ($arrLinhas as $key => $value) 
         {
            if ( $key % $total_colunas + 1 == 0 )
            {
               $objIMHtmlTable->addTr( $objIMHtmlTr );   
               $objIMHtmlTr = new IMHtmlTr();
            }

            $objIMHtmlTd = new IMHtmlTd();      
            $objIMHtmlTd->setValor( $value );      
            $objIMHtmlTr->addTd( $objIMHtmlTd );
         } 

         $objIMHtmlTable->addTr( $objIMHtmlTr );    
      }


      if ( $varios_itens == false )
      {
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
      }

      return $objIMHtmlTable;
   }

   /**
    * retorna se o array é bidimensional
    * @return bool
    */
   private function verificaBidimensional( $arr )
   {
      return is_array( $arr[0] );
   }

   /**
    * Retorna uma tabela apenas com a linha de topo do array (colunas)
    * @param  array
    * @return IMHtmlTr
    */
   public function getLinhaTopo( $arr )
   {
      $objIMHtmlTr  = new IMHtmlTr();
      $arrPrincipal = $arr;

      if ( $this->verificaBidimensional($arr) == true )
      {
         $arrPrincipal = $arr[0];
      }

      foreach ($arrPrincipal as $key => $value) 
      {
         $objIMHtmlTd = new IMHtmlTd();      
         $objIMHtmlTd->setValor( $key );      
         $objIMHtmlTr->addTd( $objIMHtmlTd );   
      }

      return $objIMHtmlTr;
   }

   /**
    * Retorna o conteudo de uma linha inteira
    * Funciona mais para bidimensional
    * @param  [array] $arr   [description]
    * @param  [int] $linha [description]
    * @return [IMHtmlTr]        [description]
    */
   public function getLinhaValor( $arr, $linha )
   {
      $varios_itens = false;
      $objIMHtmlTr  = new IMHtmlTr();
      $arrPrincipal = $arr[ $linha ];
      
      if ( is_array($arrPrincipal) )
      {
         $varios_itens = true;

         foreach ( $arrPrincipal as $key => $value) 
         { 
            $objIMHtmlTd = new IMHtmlTd();                  
            $objIMHtmlTd->setValor( $value );                  
            $objIMHtmlTr->addTd( $objIMHtmlTd );   
         }
      }   

      // se nao houve váris itens.. adiciona o original
      if ( $varios_itens == false )
      {
         foreach ($arr as $key => $value) 
         {
            $objIMHtmlTd = new IMHtmlTd();      
            $objIMHtmlTd->setValor( $value );      
            $objIMHtmlTr->addTd( $objIMHtmlTd );   
         }        
      }   

      return $objIMHtmlTr;
   }

}
?>