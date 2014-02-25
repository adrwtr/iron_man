<?
include("../nucleo.php");
define('C_PATH', '../../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );

require_once( C_PATH_INFO . 'base/ConexaoLocal.class.php' );
require_once( C_PATH_CLASS . 'conversores/IMToHTMLTable.class.php' );

// conecta na horus
$objIMConexaoBancoDados = ConexaoLocal::getConexao();
$objIMToHTMLTable = new IMToHTMLTable();

if ( $objIMConexaoBancoDados->getIsConnected() == true )
{
   $cd_empresa = '2971'; //

   $query = '
      select
         uni_p.cd_pessoa,
         uni_p.nm_pessoa,
         nu_g.ds_nome_grupo
      from
         pessoas as uni_p

         INNER JOIN estnc_empresas_pessoas as nc_e ON (
            nc_e.cd_pessoa = uni_p.cd_pessoa
         )

         INNER JOIN nu_grupos as nu_g ON (
            nu_g.cd_grupo = nc_e.cd_grupo
         )

      where
         nc_e.cd_empresa= '. $cd_empresa .'
      order by
         uni_p.nm_pessoa
      asc limit 100
   ';

   $objIMResultado = $objIMConexaoBancoDados->query( $query )->toIMResultado();
   $html = $objIMToHTMLTable->convertIMResultado( $objIMResultado );
   // echo $html;
}
?>
Recupera as pessoas da empresa <? echo $cd_empresa; ?> e mostra o grupo<BR>
<BR>
<?
echo $query;
echo "<HR>";
echo $html;
?>