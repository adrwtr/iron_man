<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera os dados de uma pessoa baseado em um codigo
 * ou nome
 * ou cpf
 * ou email
 */
class getDadosFromPessoa extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        $this->setDescricao('Recupera os dados de uma pessoa baseado em um codigo - ou nome - ou cpf - ou email');
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

        $objInputText = new InputText();
        $objInputText->setNome('ds_cpf');
        $objInputText->setLabel('CPF');
        $this->setInput($objInputText);

        $objInputText = new InputText();
        $objInputText->setNome('ds_email');
        $objInputText->setLabel('Email');
        $this->setInput($objInputText);

        $objInputText = new InputText();
        $objInputText->setNome('ds_nome');
        $objInputText->setLabel('Nome');
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
        $ds_cpf = $this->getInputValor('ds_cpf');
        $ds_email = $this->getInputValor('ds_email');
        $ds_nome = $this->getInputValor('ds_nome');

        $nm_obj_conexao = $this->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $query = '
            select
               uni_p.cd_pessoa,
               uni_p.nm_pessoa,
               uni_p.ds_cpf,
               uni_p.ds_login,
               c.ds_contato

            from
               pessoas as uni_p

               LEFT JOIN contatos_pessoas as c ON (
                  c.cd_pessoa = uni_p.cd_pessoa
               )

            where
            ';

            if ($cd_pessoa != '') {
                $query .= '
                  uni_p.cd_pessoa = "' . $cd_pessoa . '" or
               ';
            }

            if ($cd_cpf != '') {
                $query .= '
                  uni_p.ds_cpf    = "' . $cd_cpf . '" or
               ';
            }

            if ($ds_email != '') {
                $query .= '
                  c.ds_contato    like "%' . $ds_email . '%" or
               ';
            }


            if ($ds_nome != '') {
                $query .= '
                  uni_p.nm_pessoa like "%' . $ds_nome . '%"
               ';
            }

            $query .= '   
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