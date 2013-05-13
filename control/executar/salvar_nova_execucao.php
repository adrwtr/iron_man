<?
define('C_PATH', '../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( '../../conexao.php' );

require_once( '../../control/ExecutarControl.class.php' );

require_once( C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php' );
require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );
require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );
require_once( C_PATH_CLASS . 'php/IMJson.class.php' );
require_once( C_PATH_CLASS . 'base/IMString.class.php' );
require_once( C_PATH_CLASS . 'base/IMArray.class.php' );

$objExecutarControl     = new ExecutarControl();
$objIMMemoria           = new IMMemoria();
$objIMExecuta           = new IMExecuta();
$objIMReflection        = null; // new IMReflection(null);
$objIMString            = new IMString();
$objIMArray             = new IMArray();

$id              = $_REQUEST['id'];
$reexecutar      = $_REQUEST['reexecutar'];
$salvar          = $_REQUEST['salvar'];
$descricao       = $_REQUEST['descricao'];
$arrTabela       = array();
$contador_tabela = 0;
$novo_id         = 0;

$objIMMemoria->setConexao( $objIMConexaoBancoDados );
$objExecutarControl->setConexao( $objIMConexaoBancoDados );
$objIMExecuta->setConexao( $objIMConexaoBancoDados );

if ( $conectou == true && $salvar == 1 )
{
   $novo_id = $objIMExecuta->SalvaNovaExecucao( $id, $descricao, $_REQUEST );
}

if ( $novo_id > 0 )
{
   $id = $novo_id;
}


header("Location: ../../executar.php?id=". $id . "&descricao=". $descricao );
?>