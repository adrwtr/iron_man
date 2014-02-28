<?
// mostra todas as apps disponíveis
require_once("nucleo.php");

define('C_PATH', '../');
define('C_PATH_VIEW', C_PATH . 'views/' );
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );
define('C_PATH_BOOT', C_PATH . 'externos/bootstrap-3.1.1-dist/' );


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



