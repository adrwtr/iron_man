<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ADRIANO
 * Date: 17/09/13
 * Time: 08:44
 * To change this template use File | Settings | File Templates.
 */

class IMArrayToHTMLTable {

   function __construct()
   {

   }


   function convertTabelaHorizontal( $arr )
   {
      $tabela = '<table width="" border="1" cellpadding="4" cellspacing="0" class="t">';


      $tabela .= "<tr class=\"t titulo\">";

      foreach( $arr as $id => $v )
      {
         $keys = array_keys($arr);

         $tabela .= "<td>";
         $tabela .= $id;
         $tabela .=  "</td>";

      }

      $tabela .=  "</tr>";
      $tabela .=  "<tr>";

      foreach( $arr as $key_id => $key_v )
      {
         $tabela .=  "<td>";
         $tabela .=  $key_v;
         $tabela .=  "</td>";
      }

      $tabela .=  "</tr>";

      $tabela .=  '</table>';

      return $tabela;
   }


   function convertTabelaVertical( $arr )
   {
      $tabela = '<table width="" border="1" cellpadding="4" cellspacing="0" class="t">';


      foreach( $arr as $key_id => $key_v )
      {
         $tabela .=  "<tr>";

         $tabela .=  "<td>";
         $tabela .=  $key_id;
         $tabela .=  "</td>";

         $tabela .=  "<td>";
         $tabela .=  $key_v;
         $tabela .=  "</td>";

         $tabela .=  "</tr>";
      }


      $tabela .=  '</table>';

      return $tabela;
   }

}