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
   $cd_instituicao = '1'; // nead ?

   $query = '
      select
         uni_p.cd_pessoa,
         uni_p.nm_pessoa,
         nu_g.ds_nome_grupo
      from
         pessoas as uni_p

         INNER JOIN estnc_instituicoes_pessoas as nc_ip ON (
            nc_ip.cd_pessoa = uni_p.cd_pessoa
         )

         INNER JOIN nu_grupos as nu_g ON (
            nu_g.cd_grupo = nc_ip.cd_grupo
         )

      where
         nc_ip.cd_instituicao = '. $cd_instituicao .' and
         nc_ip.cd_grupo <> 2
      order by
         uni_p.nm_pessoa
      asc limit 100
   ';

   $objIMResultado = $objIMConexaoBancoDados->query( $query )->toIMResultado();
   $html = $objIMToHTMLTable->convertIMResultado( $objIMResultado );
   // echo $html;
}
?>
Recupera as pessoas da ie 2 e mostra o grupo<BR>
<BR>
<?
echo $query;
echo "<HR>";
echo $html;
?>