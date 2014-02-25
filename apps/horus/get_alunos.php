<?
include("../nucleo.php");
define('C_PATH', '../../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );

require_once( C_PATH_INFO . 'base/ConexaoHorus.class.php' );
require_once( C_PATH_CLASS . 'conversores/IMToHTMLTable.class.php' );

// conecta na horus
$objIMConexaoBancoDados = ConexaoHorus::getConexao();
$objIMToHTMLTable = new IMToHTMLTable();

if ( $objIMConexaoBancoDados->getIsConnected() == true )
{
   $cd_instituicao = '2'; // nead ?

   $query = '
      select
         uni_p.cd_pessoa,
         uni_p.nm_pessoa
      from
         pessoas as uni_p

         INNER JOIN estnc_instituicoes_pessoas as nc_ip ON (
            nc_ip.cd_pessoa = uni_p.cd_pessoa
         )
      where
         nc_ip.cd_instituicao = '. $cd_instituicao .' and
         nc_ip.cd_grupo = 2
      order by
         uni_p.nm_pessoa
      asc limit 100
   ';

   $objIMResultado = $objIMConexaoBancoDados->query( $query )->toIMResultado();
   $html = $objIMToHTMLTable->convertIMResultado( $objIMResultado );
   // echo $html;
}
?>
Recupera os alunos da IE 2<BR>
<BR>
<?
echo $query;
echo "<HR>";
echo $html;
?>