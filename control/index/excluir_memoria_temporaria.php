<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH . 'conexao.php' );

$objIMMemoria = new IMMemoria();
$objIMMemoria->setConexao( $objIMConexaoBancoDados );

$id = $_REQUEST['id'];

// Exclui registro da memoria temporaria
$objIMMemoria->deleteFromMemoriaTemporaria( $id );

header("Location: ../../index.php?painel=2");
?>