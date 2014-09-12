<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;
use imclass\apps\inputs\InputSelectList;
use info_data\base\ConexaoLocalOrcamentos;
use imclass\conversores\imarray\IMArrayToHTMLTable;


/**
 * Visualizar ativides de pacotes de projetos
 */
class verPacotesAtividadesProjeto extends AppConcreto
{
    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Visualizar ativides de pacotes de projetos');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        // para qual projeto?
        $objInputSelectList = new InputSelectList();
        $objInputSelectList->setNome('cd_projeto');
        $objInputSelectList->setLabel('Qual projeto?');
        $arrValores = $this->getProjetos();
        
        foreach ($arrValores as $valor => $label) 
        {            
            $objInputSelectList->addValoresCampo( 
                $label,
                $valor
            );
        }

        $this->getObjAppInputs()
            ->addInput($objInputSelectList);  
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
        $cd_projeto = $this->getObjAppInputs()
            ->getInputValor('cd_projeto');

            
        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados = $objConexaoLocalOrcamentos->getConexao();

        if ($objIMConexaoBancoDados != null) {
            $this->query = "
SELECT
    eap.ds_pacote, 
    pa.hr_tempo_decorrido, 
    pa.qtd_atividade, 
    ac.ds_atividade,
    COALESCE(ac.nr_media, 1) *  COALESCE( pa.qtd_atividade, 1) as estimativa_total
FROM
    pacotes as eap

    left join pacotes_atividades as pa ON (
        pa.cd_pacote = eap.cd_pacote
    )

    left join atividades_comuns as ac ON (
        ac.cd_atividade = pa.cd_atividade
    )
order by
    eap.cd_pacote
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

        $estimativa_total = 0;
        foreach ($this->getResultado() as $key => $value) 
        {
            $estimativa_total += $value['estimativa_total'];
        }

        $html .= "Estimativa de Horas: <b>". $estimativa_total ."</b>";
        $html .= "<BR><BR> " . $this->query;
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


     /**
     * Retorna a lista de projetos
     * @return array
     */
    private function getProjetos()
    {
        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados = $objConexaoLocalOrcamentos->getConexao();

        $this->query = "
            select
                cd_projeto,
                ds_projeto
            from
                projetos
            order by
                ds_projeto asc,
                dt_projeto desc
        ";

        $arrValores = $objIMConexaoBancoDados->query($this->query);

        foreach ($arrValores as $key => $value) 
        {
            $arrNovo[$value['cd_projeto']] = $value['ds_projeto'];
        }

        return $arrNovo;        
    }
}