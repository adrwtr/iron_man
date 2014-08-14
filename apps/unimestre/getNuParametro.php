<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera um parametro da tabela nu_parametros
 */
class getNuParametro extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera um parametro da tabela nu_parametros');
        $this->setCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('ds_parametro');
        $objInputText->setLabel('Parâmetro');

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
        
        $cd_instituicao = $this->getObjAppInputs()
            ->getInputValor('ds_parametro');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $this->query = '
            select
               cd_parametro,
               ds_parametro,
               ds_valor,
               cd_modulo
            from
               nu_parametros as nu_p
            where
               nu_p.ds_parametro like \'%' . $cd_instituicao . '%\' 
            order by
               nu_p.ds_parametro
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