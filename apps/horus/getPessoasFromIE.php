<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera as pessoas de uma instituição de ensino - Não pega alunos
 */
class getPessoasFromIE extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        $this->setDescricao('Recupera as pessoas de uma instituição de ensino - Não pega alunos');
        $this->setCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('cd_instituicao');
        $objInputText->setLabel('Código da Instituição');

        $this->setInput($objInputText);


        $objInputConexoesMysql = new InputConexoesMysql();
        $objInputConexoesMysql->setNome('nm_obj_conexao');

        $this->setInput($objInputConexoesMysql);
    }

    /**
     * Executa a função
     */
    public function executar()
    {
        $retorno = '';
        $cd_instituicao = $this->getInputValor('cd_instituicao');
        $nm_obj_conexao = $this->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
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

               LEFT JOIN nu_grupos as nu_g ON (
                  nu_g.cd_grupo = nc_ip.cd_grupo
               )

            where
               nc_ip.cd_instituicao = ' . $cd_instituicao . ' and
               nc_ip.cd_grupo <> 2
            order by
               uni_p.nm_pessoa
            asc limit 100
         ';

            $arrValores = $objIMConexaoBancoDados->query($query);
            $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

            $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaHorizontal(
                $arrValores
            );

            $html = $this->getHTML(
                $objIMHtmlTable
            );

            $html .= "<BR> " . $query;

            return $html;
        }
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