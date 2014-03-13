<?
define('C_PATH_RAIZ',      '../');
define('C_PATH_VIEW',      C_PATH_RAIZ . 'views/' );
define('C_PATH_INFO',      C_PATH_RAIZ . 'info_data/' );
define('C_PATH_BOOT',      C_PATH_RAIZ . 'externos/bootstrap-3.1.1-dist/' );
define('C_PATH_ANGULAR',   C_PATH_RAIZ . 'externos/angularjs/angular.min.js' );

require_once("nucleo.php");
require_once("iniciador_bootstrap.php");


$path = $_REQUEST['class_path'];
$nome = $_REQUEST['class_nome'];

require_once( C_PATH .  $path . '.php' );

$objiAppInterface = new $nome();
 
$descricao = $objiAppInterface->getDescricao();
$arrInputs = $objiAppInterface->getArrInputs();

/**
 * Recupera os nomes e os valores
 */
if ( is_array($arrInputs) )
{
   foreach( $arrInputs as $id => $objiInput ) 
   {
      $nome_campo  = $objiInput->getNome();
      $valor_campo = $_REQUEST[ $nome_campo ];

      $objiAppInterface->setInputValor( $nome_campo, $valor_campo );
   }   
}

$objiAppInterface->executar();
?>

<p><a class="btn btn-primary btn-lg" role="button" href="index.php">Voltar</a></p>



