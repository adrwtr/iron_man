<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\link\LinkCampo;

use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;

use imclass\uteis\base\IMGetConexaoBancoFromNome;

use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera os campos de uma tabela
 */
class getCamposFromTabela extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera os campos de uma tabela');
        $this->setCampos();
        $this->setLinkCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('ds_nome_tabela');
        $objInputText->setLabel('Filtro de Nome da Tabela');

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
        $ds_nome_tabela = $this->getObjAppInputs()->getInputValor('ds_nome_tabela');
        $nm_obj_conexao = $this->getObjAppInputs()->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
        $objIMConexaoAtributos = $objIMConexaoBancoDados->getobjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        if ($objIMConexaoBancoDados != null) {
            $query = "
            SHOW COLUMNS FROM $ds_nome_tabela;
         ";

            $arrValores = $objIMConexaoBancoDados->query($query);
            $this->resultado = $arrValores;
        }

        return $this;
    }

    public function getResultadoOutput()
    {
        $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

        $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaHorizontal(
            $this->resultado
        );

        $html = $this->getHTML(
            $objIMHtmlTable
        );

        $html .= "<BR> " . $query;

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