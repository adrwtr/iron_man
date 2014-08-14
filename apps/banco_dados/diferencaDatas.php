<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\link\LinkCampo;

use imclass\apps\inputs\InputDateText;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;

use imclass\uteis\base\IMGetConexaoBancoFromNome;

use imclass\conversores\imarray\IMArrayToHTMLTable;
use imclass\conversores\imarray\IMArrayToSqlInsert;

use imclass\imphp\IMDateTime;

/**
 * Retorna a diferença entre duas datas
 */
class diferencaDatas extends AppConcreto
{
   var $query;
   var $tabela;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Retorna a diferença entre duas datas');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputDateText = new InputDateText();
        $objInputDateText->setNome('ds_data1');
        $objInputDateText->setLabel('Data 1');

        $this->getObjAppInputs()
            ->addInput($objInputDateText);

        $objInputDateText = new InputDateText();
        $objInputDateText->setNome('ds_data2');
        $objInputDateText->setLabel('Data 2');
        $objInputDateText->setValor(date("d/m/Y"));

        $this->getObjAppInputs()
            ->addInput($objInputDateText);            

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
        $objIMDateTime = new IMDateTime("");

        $ds_data1 = $this->getObjAppInputs()
            ->getInputValor('ds_data1');

        $ds_data2 = $this->getObjAppInputs()
            ->getInputValor('ds_data2');            

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMDateTime->SetDataPtbr( $ds_data1 );
        $ds_data1 = $objIMDateTime->getDataEn();

        $objIMDateTime->SetDataPtbr( $ds_data2 );
        $ds_data2 = $objIMDateTime->getDataEn();


        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
                
        $objIMConexaoAtributos = $objIMConexaoBancoDados->getObjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        if ($objIMConexaoBancoDados != null) {
            $this->query = "select DATEDIFF('". $ds_data1 ."', '". $ds_data2 ."');";
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
        $html .= "<HR>";

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