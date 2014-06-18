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
        $this->setDescricao('Retorna uma tabela baseado nos campos e valores de um sql insert');
        $this->setCampos();
    }

    /**
     * Cria os campos necess�rios
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('query');
        $objInputText->setLabel('query');

        $this->setInput($objInputText);
    }

    /**
     * Executa a fun��o
     */
    public function executar()
    {
        $return = '';

        $objIMSqlParserInsert = new IMSqlParserInsert();
        $objIMSqlParserInsert->parse($this->getInputValor('query'));

        $return .= 'Recupera o insert<BR>';
        $return .= '<BR>';

        $return .= 'Tabela: ' . $objIMSqlParserInsert->getStrTableName();
        $return .= '<HR>';

        $objIMArrayToHTMLTable = new IMArrayToHTMLTable();

        $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaVertical(
            $objIMSqlParserInsert->mergeArray()
        );


        /*$return .= $objIMArrayToHTMLTable->convertTabelaHorizontal(
           $objIMSqlParserInsert->mergeArray()
        )->getHTML();*/


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