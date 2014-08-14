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

    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera os campos de uma tabela');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('ds_nome_tabela');
        $objInputText->setLabel('Filtro de Nome da Tabela');

        $this->getObjAppInputs()
            ->addInput($objInputText);

        $objInputConexoesMysql = new InputConexoesMysql();
        $objInputConexoesMysql->setNome('nm_obj_conexao');

        $this->getObjAppInputs()
            ->addInput($objInputConexoesMysql);
    }

    /**
     * seta os possiveis retornos que esta classe pode fazer
     * para outra classe
     */
    public function setLinkRetornos()
    {
       /*n*/
    }

    /**
     * Executa a função
     */
    public function executar()
    {        
        $ds_nome_tabela = $this->getObjAppInputs()
            ->getInputValor('ds_nome_tabela');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
        $objIMConexaoAtributos = $objIMConexaoBancoDados->getObjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        if ($objIMConexaoBancoDados != null) {
            $this->query = "
            SHOW COLUMNS FROM $ds_nome_tabela;
         ";

            $arrValores = $objIMConexaoBancoDados->query($this->query);
            $this->setResultado($arrValores);
        }
    }

    public function getResultadoOutput()
    {
        $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

        $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaHorizontal(
            $this->getResultado()
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