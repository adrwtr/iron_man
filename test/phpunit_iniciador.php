<?
define('C_PATH_RAIZ',      '../../');
define('C_PATH_VIEW',      C_PATH_RAIZ . 'views/' );
define('C_PATH_INFO',      C_PATH_RAIZ . 'info_data/' );
define('C_PATH_BOOT',      C_PATH_RAIZ . 'externos/bootstrap-3.1.1-dist/' );
define('C_PATH_ANGULAR',   C_PATH_RAIZ . 'externos/angularjs/angular.min.js' );

/**
 * Mostra o valor da variavel
 * @param $a variavel
 */
function vl($a)
{
    echo var_dump($a);
    echo "<HR>";
}

/**
 * Esta funчуo ajuda a gente a puxar as classes e ao mesmo tempo
 * utilizar o pacote do phpunit
 */
function IMAutoLoadPHPUNIT( $pClassName ) 
{
   $path = __DIR__;
   $path = str_replace( "test", "", $path );

   if ( $pClassName != 'PHPUnit_Extensions_Story_TestCase' )
   {
      if ( file_exists($path . "/" . $pClassName . ".php") )
      {
         require_once( $path . "/" . $pClassName . ".php");
      }
   }

   echo $pClassName . "\n\n";   
}

spl_autoload_register("IMAutoLoadPHPUNIT");
?>