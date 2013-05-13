<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );
require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH . 'conexao.php' );

$objIMExecuta = new IMExecuta();
$objIMMemoria = new IMMemoria();

$objIMExecuta->setConexao( $objIMConexaoBancoDados );
$objIMMemoria->setConexao( $objIMConexaoBancoDados );

$id = $_REQUEST['id'];

// exclui memorias
$arrTree = $objIMExecuta->getListaExecucaoById( $id );

foreach ($arrTree as $key => $value) 
{
   // exclui
   vl( $value['cd_memoria_parametro'] );
   $objIMMemoria->deleteFromMemoriaInfo( $value['cd_memoria_parametro'] );
}

// Exclui registro da execucao
$objIMExecuta->deleteExecucao( $id );

header("Location: ../../index.php");
?>