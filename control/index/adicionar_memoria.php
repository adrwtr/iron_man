<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH_CLASS . 'base/IMString.class.php' );
require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );

require_once( C_PATH . 'conexao.php' );

$descricao    = $_REQUEST['descricao'];
$valor        = $_REQUEST['valor'];

if ( $valor != '' )
{
   $objIMMemoria = new IMMemoria();
   $objIMString  = new IMString();

   $objIMMemoria->setConexao( $objIMConexaoBancoDados );
   $objIMString->set( $valor );

   $objUMReflection = new IMReflection( $objIMString );

   $objIMMemoria->SalvarMemoriaTemporaria( $descricao, $objUMReflection->getNome(), $objUMReflection->getAtributos() );
}

header("Location: ../../index.php?painel=2");
?>