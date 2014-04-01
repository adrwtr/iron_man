<?php
namespace imclass\conversores;

/**
 * Created by JetBrains PhpStorm.
 * User: ADRIANO
 * Date: 17/09/13
 * Time: 08:44
 * To change this template use File | Settings | File Templates.
 */

class IMToHTMLTable {

   function __construct()
   {

   }

   /**
    * Converte IMResultado para tabela
    * @param $objIMResultado
    */
   function convertIMResultado( $objIMResultado )
   {

      $array = $objIMResultado->get();

      if ( is_array($array) && count($array) > 0 )
      {

         $tabela = '<table width="" border="1" cellpadding="4" cellspacing="0" class="t">';

         $foi = false;

         foreach( $array as $id => $v )
         {
            $keys = array_keys($v);

            if ( $foi == false )
            {
               $foi = true;

               $tabela .= "<tr class=\"t titulo\">";
               foreach( $keys as $key_v )
               {
                  $tabela .= "<td>";
                  $tabela .= $key_v;
                  $tabela .=  "</td>";
               }
               $tabela .=  "</tr>";
            }

            $tabela .=  "<tr>";
            foreach( $keys as $key_id => $key_v )
            {
               $tabela .=  "<td>";
               $tabela .=  $v[ $key_v ];
               $tabela .=  "</td>";
            }
            $tabela .=  "</tr>";
         }

         $tabela .=  '</table>';
      }

      return $tabela;
   }




}