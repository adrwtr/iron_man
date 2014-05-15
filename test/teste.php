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
      else
      {
         // echo "AQUI: $pClassName \n\n\n";

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

spl_autoload_register("IMAutoLoadPHPUNIT");


use imclass\banco_dados\IMConexaoAtributos;

$arr = array(
   '1' => 'teste'
);

$a = var_export($arr, true);
vl($a);

$b = eval( "return array (
  0 => 
  array (
    'cd_pessoa' => '797250',
    'nm_pessoa' => 'Nicolas De Oliveira Ribeiro',
    'ds_cpf' => '03550148070',
    'ds_login' => 'nicolas98ribeiro@hotmail.com',
    'ds_contato' => 'nicolas98ribeiro@hotmail.com',
  ),
);" );
vl($b);  



?>