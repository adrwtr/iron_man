<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera as empresas da pessoa
 */
class getEmpresasFromPessoas extends AppConcreto
{
    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera as empresas da pessoa');
        $this->setCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('cd_pessoa');
        $objInputText->setLabel('Código da Pessoa');

        $this->getObjAppInputs()->addInput($objInputText);


        $objInputConexoesMysql = new InputConexoesMysql();
        $objInputConexoesMysql->setNome('nm_obj_conexao');

        $this->getObjAppInputs()->addInput($objInputConexoesMysql);
    }

    /**
     * Executa a função
     */
    public function executar()
    {
        $retorno = '';
        $cd_estagio = $this->getObjAppInputs()->getInputValor('cd_estagio');
        $nm_obj_conexao = $this->getObjAppInputs()->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $this->query = '
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
               nc_e.cd_pessoa = ' . $cd_pessoa . '
            order by
               uni_p.nm_pessoa
            asc limit 100
         ';

            $arrValores = $objIMConexaoBancoDados->query($this->query);
            $this->setResultado( $arrValores );
        }
    }

    public function getResultadoOutput()
    {
        $arrValores = $this->getResultado();
        $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

        $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaHorizontal(
            $arrValores
        );

        $html = $this->getHTML(
            $objIMHtmlTable
        );

        $html .= "<BR> " . $this->query;

        return $html;
    }

    private function getHTML($objIMHtmlTable)
    {

        $objIMHtmlTable->setAttr(' class="table" ');

        $html = '
         <div class="panel panel-default">         
         <div class="panel-heading">Resultado</div>
      ';

        $html .= $objIMHtmlTable->getHTML();
        $html .= '</div>';

        return $html;
    }
}

?>