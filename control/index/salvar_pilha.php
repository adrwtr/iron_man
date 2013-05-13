<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );
require_once( C_PATH . 'conexao.php' );

$objIMExecuta = new IMExecuta();
$objIMExecuta->setConexao( $objIMConexaoBancoDados );

$descricao    = $_REQUEST['descricao'];

$objIMExecuta->SalvaPilhaExecucao( $descricao );
header("Location: ../../index.php");
?>