<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera os estagios de uma pessoa
 */
class getEstagiosFromPessoas extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        $this->setDescricao('Recupera os estagios de uma pessoa');
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
        $cd_pessoa = $this->getInputValor('cd_pessoa');
        $nm_obj_conexao = $this->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $query = '
            select
               nc_e.cd_estagio,
               nc_e.cd_pessoa,
               nc_e.cd_empresa,
               nc_e.cd_instituicao
            from
               estnc_estagios as nc_e

               INNER JOIN empresas as e ON (
                  e.cd_empresa = nc_e.cd_empresa
               )

               INNER JOIN instituicoes_ensino as i ON (
                  i.cd_instituicao = nc_e.cd_instituicao
               )

            where
               nc_e.cd_pessoa = ' . $cd_pessoa . '
            order by
               nc_e.cd_estagio 
            desc limit 100
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