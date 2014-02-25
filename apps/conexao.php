<?
include("nucleo.php");
define('C_PATH', '../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );

require_once( C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php' );
require_once( C_PATH_CLASS . 'banco_dados/IMConexaoAtributos.class.php' );
require_once( C_PATH_INFO . 'base/ConexaoLocal.class.php' );


$objIMConexaoAtributos = new IMConexaoAtributos();

$objIMConexaoAtributos->setNomeBanco("unimestre");
$objIMConexaoAtributos->setLogin("backup");
$objIMConexaoAtributos->setSenha("UniSeguro");
$objIMConexaoAtributos->setBanco("adriano");
$objIMConexaoAtributos->setHost("localhost");
$objIMConexaoAtributos->setPorta("");

$objIMConexaoBancoDados = new IMConexaoBancoDados();
$conectou = $objIMConexaoBancoDados->conectarMysql( $objIMConexaoAtributos );

vl( $conectou );

/**
 * Ou
 */
$objIMConexaoBancoDados = ConexaoLocal::getConexao();
vl( $objIMConexaoBancoDados->getIsConnected() );
?>