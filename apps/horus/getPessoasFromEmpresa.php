<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera as pessoas de uma empresa
 */
class getPessoasFromEmpresa extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera as pessoas de uma empresa');
        $this->setCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('cd_empresa');
        $objInputText->setLabel('Código da Empresa');

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
        $cd_empresa = $this->getObjAppInputs()->getInputValor('cd_empresa');
        $nm_obj_conexao = $this->getObjAppInputs()->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $this->query = '
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
               nc_e.cd_empresa= ' . $cd_empresa . '
            order by
               uni_p.nm_pessoa
            asc limit 100
         ';

            $arrValores = $objIMConexaoBancoDados->query($this->query);
            $this->setResultado($arrValores);
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