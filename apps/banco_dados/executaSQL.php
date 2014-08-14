<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\link\LinkCampo;

use imclass\apps\inputs\InputTextArea;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;

use imclass\uteis\base\IMGetConexaoBancoFromNome;

use imclass\conversores\imarray\IMArrayToHTMLTable;
use imclass\conversores\imarray\IMArrayToSqlInsert;

/**
 * Executa um sql
 */
class executaSQL extends AppConcreto
{
   var $query;
   var $tabela;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Executa um sql');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputTextArea = new InputTextArea();
        $objInputTextArea->setNome('ds_sql');
        $objInputTextArea->setLabel('SQL');

        $this->getObjAppInputs()
            ->addInput($objInputTextArea);

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
        $ds_sql = $this->getObjAppInputs()
            ->getInputValor('ds_sql');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
                
        $objIMConexaoAtributos = $objIMConexaoBancoDados->getObjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        if ($objIMConexaoBancoDados != null) {
            $this->query = $ds_sql;
            $arrValores = $objIMConexaoBancoDados->query($this->query);
            $this->tabela = $this->descobreTabela($this->query);
            $this->setResultado($arrValores);
        }
    }

    public function getResultadoOutput()
    {
        $objIMArrayToHTMLTable = new IMArrayToHTMLTable();
        $objIMArrayToSqlInsert = new IMArrayToSqlInsert();
        // $objInputText = new InputText();
        // $objInputText->setNome('ds_resultado');

        $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaHorizontal(
            $this->getResultado()
        );

        $html = $this->getHTML(
            $objIMHtmlTable
        );

        // $objInputText->setValor($html);

        $html .= "<BR> " . $this->query;
        $html .= "<HR>";

        $html .= $objIMArrayToSqlInsert->convertToInsert(
            $this->tabela,
            $this->getResultado()
        );

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


    private function descobreTabela($sql)
    {
        $sql      = strtoupper($sql);        
        $from     = strpos( $sql, 'FROM' );        
        $sql_novo = substr( $sql, $from+4, strlen($sql));        
        $espaco   = strpos( trim($sql_novo), ' ' );
        $tabela   = substr(trim($sql_novo), 0, $espaco);

        return $tabela;
    }
}