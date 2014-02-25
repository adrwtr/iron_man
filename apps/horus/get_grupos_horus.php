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
   $query = "
      select
         *
      from
         nu_grupos
      where
         ds_papel in (
            'USUARIO',
            'FUNCIONARIO',
            'EMPRESAS',
            'C_ESTNC_TPESS_TI_IE',
            'C_ESTNC_TPESS_SUPERV',
            'C_ESTNC_TPESS_REPRE_IE',
            'C_ESTNC_TPESS_REPRE_CONTAT',
            'C_ESTNC_TPESS_REPRE_CONCE',
            'C_ESTNC_TPESS_ORIENT_EST',
            'C_ESTNC_TPESS_GER_ACAD',
            'C_ESTNC_TPESS_AI',
            'ALUNO',
            'ADMIN'
         )
      Group by
         ds_papel
      order by
         cd_grupo

   ";

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