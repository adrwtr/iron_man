<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera as avaliações de um estagio
 */
class getAgendasAvaliacoesFromEstagios extends AppConcreto
{

    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera as avaliações de um estagio');
        $this->setCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('cd_estagio');
        $objInputText->setLabel('Código do Estágio');

        $this->getObjAppInputs()
            ->addInput($objInputText);


        $objInputConexoesMysql = new InputConexoesMysql();
        $objInputConexoesMysql->setNome('nm_obj_conexao');

        $this->getObjAppInputs()
            ->addInput($objInputConexoesMysql);
    }

    /**
     * Executa a função
     */
    public function executar()
    {
        $retorno = '';

        $cd_estagio = $this->getObjAppInputs()
            ->getInputValor('cd_estagio');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $this->query = '
            select
               cd_avaliacao_agendar,
               cd_estagio,
               cd_grupo,
               date_format( dt_inicial, \'%d/%m/%Y\'),
               date_format( dt_final, \'%d/%m/%Y\'),
               sn_respondido
            from
               estnc_avaliacoes_agendar
            where
               cd_estagio = ' . $cd_estagio . '
            order by
               dt_inicial asc, dt_final    asc limit 100
         ';

            $arrValores = $objIMConexaoBancoDados
                ->query($this->query);
            
            $this->setResultado( $arrValores );
            return $this;
        }
        
        $this->setResultado('nada');
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