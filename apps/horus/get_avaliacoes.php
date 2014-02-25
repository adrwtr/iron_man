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
   $cd_estagio = '18502';

   $query = '
      select
         cd_avaliacao_agendar,
         cd_estagio,
         cd_grupo,
         date_format( dt_inicial, \'%d/%m/%Y\'),
         date_format( dt_final, \'%d/%m/%Y\'),
         sn_respondido
      from
         estnc_avaliacoes_agendar
      where
         cd_estagio = '. $cd_estagio .'
      order by
         dt_inicial asc, dt_final    asc limit 100
   ';

   $objIMResultado = $objIMConexaoBancoDados->query( $query )->toIMResultado();
   $html = $objIMToHTMLTable->convertIMResultado( $objIMResultado );
   // echo $html;
}
?>
<html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<body>
Recupera as avaliações de um estagio<BR>
<BR>
<?
echo $cd_estagio;
echo "<BR>";
echo $query;
echo "<HR>";
echo $html;
?>
</body>
</html>