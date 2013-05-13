<?
function vl($a)
{
   echo var_dump($a);
   echo "<HR>";
}

require_once( 'control/ConexaoControl.class.php' );
require_once( C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php' );

$objIMConexaoBancoDados = new IMConexaoBancoDados();
$objConexaoControl      = new ConexaoControl();

$conectou = $objIMConexaoBancoDados->conectarMysql( $objConexaoControl->getAtributosdeConexao() );

if ( $conectou == false )
{
   vl('A conexão com o banco falhou!');
   die();
}

