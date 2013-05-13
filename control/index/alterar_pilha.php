<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );
require_once( C_PATH . 'conexao.php' );

$objIMExecuta           = new IMExecuta();

$objIMExecuta->setConexao( $objIMConexaoBancoDados );

$id      = $_REQUEST['id'];
$ordenar = $_REQUEST['ordenar'];
$ordem   = $_REQUEST['ordem'];
$excluir = $_REQUEST['excluir'];


if ( $ordenar == 'im_executa_temp' && $ordem != '' )
{
   $objIMExecuta->OrdenarTemporaria( $id, $ordem );
   header("Location: index.php?painel=paine3");
}

if ( $excluir == 'im_executa_temp' )
{
   $objIMExecuta->deleteFromExecutaTemporaria( $id );
   header("Location: index.php?painel=paine3");
}


header("Location: ../../index.php?painel=3");
?>