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
use imclass\base\IMErro;
use imclass\banco_dados\IMConexaoBancoDadosPDO;



$objIMConexaoBancoDadosPDO = getConexaoParaTesteOK();
$result  = $objIMConexaoBancoDadosPDO->query("select * from pessoas");

vl($result);





   function getAtributosOK()
   {
      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("Teste UNITTEST");
      $objIMConexaoAtributos->setLogin("moodle");
      $objIMConexaoAtributos->setSenha("moodle");
      $objIMConexaoAtributos->setBanco("unimestre_horus_branco");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");

      return $objIMConexaoAtributos;
   }

   function getConexaoParaTesteOK()
   {
      $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
      $objIMConexaoBancoDadosPDO->conectar( getAtributosOK() );

      return $objIMConexaoBancoDadosPDO;
   }

  

?>