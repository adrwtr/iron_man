<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;

use imclass\banco_dados\sql_parser\IMSqlParserInsert;
use imclass\conversores\imarray\IMArrayToHTMLTable;

class getInsertArray extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Retorna uma tabela baseado nos campos e valores de um sql insert');
        $this->setCampos();
    }

    /**
     * Cria os campos necessarios
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('query');
        $objInputText->setLabel('query');

        $this->getObjAppInputs()->addInput($objInputText);
    }

    /**
     * Executa a funcao
     */
    public function executar()
    {
        $return = '';

        $objIMSqlParserInsert = new IMSqlParserInsert();
        $objIMSqlParserInsert->parse($this->getObjAppInputs()->getInputValor('query'));

        $return .= 'Recupera o insert<BR>';
        $return .= '<BR>';

        $return .= 'Tabela: ' . $objIMSqlParserInsert->getStrTableName();
        $return .= '<HR>';

        $this->setResultado(
            $objIMSqlParserInsert->mergeArray()
        );        
    }

    public function getResultadoOutput()
    {
        $arrValores = $this->getResultado();
        
        $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

        $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaVertical(
            $arrValores
        );

        $html = $this->getHTML($objIMHtmlTable);

        $return .= $html;

        return $return;
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