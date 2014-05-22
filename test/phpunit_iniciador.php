<?
define('C_PATH_RAIZ',            '../');
require_once C_PATH_RAIZ . 'apps/nucleo.php';
require_once C_PATH_DOCTRINE . '/autoload.php';

/**
 * Esta funчуo ajuda a gente a puxar as classes e ao mesmo tempo
 * utilizar o pacote do phpunit
 */
/*function IMAutoLoadPHPUNIT( $pClassName ) 
{
   // vl($pClassName);

   $path = __DIR__;
   $path = str_replace( "test", "", $path );

   if ( $pClassName != 'PHPUnit_Extensions_Story_TestCase' )
   {
      if ( file_exists($path . "/" . $pClassName . ".php") )
      {
         // vl('aqui 1 : ' . $path . $pClassName . ".php" );
         require_once( $path . $pClassName . ".php");
      }
      else
      {

          echo "AQUI: $pClassName \n\n\n";

         if ( file_exists( $pClassName . ".php") )
         {            
            require_once( $pClassName . ".php" );
         }
         else
         {
            // echo "\n\nNуo consegui:" .  $path . "/" . $pClassName . ".php\n\n";
         }
      }
   }

    // echo $pClassName . "\n\n";   
}

spl_autoload_register("IMAutoLoadPHPUNIT");*/
?>