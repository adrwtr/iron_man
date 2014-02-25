<?
include("../nucleo.php");
define('C_PATH', '../../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );

require_once( C_PATH_INFO . 'base/ConexaoHorusTeste.class.php' );
require_once( C_PATH_CLASS . 'conversores/IMToHTMLTable.class.php' );

// conecta na horus
$objIMConexaoBancoDados = ConexaoHorusTeste::getConexao();
$objIMToHTMLTable = new IMToHTMLTable();

if ( $objIMConexaoBancoDados->getIsConnected() == true )
{
   $cd_pessoa = '776679'; //

   $query = '
      select
        e.cd_empresa,
        e.nm_empresa,
        uni_p.cd_pessoa,
        uni_p.nm_pessoa
      from
         pessoas as uni_p

         INNER JOIN estnc_empresas_pessoas as nc_e ON (
            nc_e.cd_pessoa = uni_p.cd_pessoa
         )

         INNER JOIN nu_grupos as nu_g ON (
            nu_g.cd_grupo = nc_e.cd_grupo
         )

         INNER JOIN empresas as e ON (
            e.cd_empresa = nc_e.cd_empresa
         )

      where
         nc_e.cd_pessoa = '. $cd_pessoa .'
      order by
         uni_p.nm_pessoa
      asc limit 100
   ';

   $objIMResultado = $objIMConexaoBancoDados->query( $query )->toIMResultado();
   $html = $objIMToHTMLTable->convertIMResultado( $objIMResultado );
   // echo $html;
}
?>
Recupera as empresas da pessoa <? echo $cd_pessoa; ?> e mostra o grupo<BR>
<BR>
<?
echo $query;
echo "<HR>";
echo $html;
?>