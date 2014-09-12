<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\link\LinkCampo;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputSelectCombo;
use imclass\apps\inputs\InputSelectList;

use info_data\base\ConexaoLocalOrcamentos;


/**
 * Cadastra uma atividade para o pacote 
 */
class addPacoteAtividade extends AppConcreto
{
    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Cadastra uma atividade para o pacote');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        // tempo estimado
        $objInputText = new InputText();
        $objInputText->setNome('qtd_atividade');
        $objInputText->setLabel('Quantidade de Vezes');

        $this->getObjAppInputs()
            ->addInput($objInputText);

        // pacotes
        $objInputSelectCombo = new InputSelectCombo();
        $objInputSelectCombo->setNome('cd_pacote');
        $objInputSelectCombo->setLabel('Pacote Trabalho');

        $arrValores = $this->getProjetosPacotes();

        foreach ($arrValores as $valor => $label) 
        {            
            $objInputSelectCombo->addValoresCampo( 
                $label,
                $valor
            );
        }

        $this->getObjAppInputs()
            ->addInput($objInputSelectCombo);  

        // atividades
        $arrValores = $this->getAtividades();
        $objInputSelectList = new InputSelectList();

        $objInputSelectList->setNome('cd_atividade');
        $objInputSelectList->setLabel('Atividade');

        $arrValores = $this->getAtividades();

        foreach ($arrValores as $valor => $label) 
        {            
            $objInputSelectList->addValoresCampo( 
                $label,
                $valor
            );
        }

        $objInputSelectList->setValor(0);

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
        $qtd_atividade = $this->getObjAppInputs()
            ->getInputValor('qtd_atividade');

        $cd_pacote = $this->getObjAppInputs()
            ->getInputValor('cd_pacote');

        $cd_atividade = $this->getObjAppInputs()
            ->getInputValor('cd_atividade');            
            
        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados = $objConexaoLocalOrcamentos->getConexao();

        if ($objIMConexaoBancoDados != null) {
            $this->query = "insert into pacotes_atividades ( cd_atividade, cd_pacote, qtd_atividade ) value (
                '". $cd_atividade ."', '". $cd_pacote ."', '". $qtd_atividade ."'
            );
            ";

            $arrValores = $objIMConexaoBancoDados->executar(
                $this->query
            );            
            $this->setResultado("Atividade inserida");
        }
    }

    public function getResultadoOutput()
    {
        $html = $this->getResultado();
        
        $html .= "<BR> " . $this->query;
        $html .= "<HR>";

        return $html;
    }


    /**
     * Retorna a lista de pacotes de todos os projetos
     * @return array
     */
    private function getProjetosPacotes()
    {
        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados = $objConexaoLocalOrcamentos->getConexao();

        $this->query = "
            SELECT
                p.cd_projeto, p.ds_projeto,
                eap.cd_pacote, eap.ds_pacote
            FROM
                projetos as p
                
                inner join pacotes as eap ON (
                    eap.cd_projeto = p.cd_projeto
                )
            order by
                p.cd_projeto asc, eap.cd_pacote asc
        ";

        $arrValores = $objIMConexaoBancoDados->query($this->query);

        foreach ($arrValores as $key => $value) 
        {
            $arrNovo[$value['cd_pacote']] = $value['ds_projeto'] . ' - ' . $value['ds_pacote'];
        }

        return $arrNovo;        
    }


    /**
     * Retorna a lista de atividades
     * @return array
     */
    private function getAtividades()
    {
        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados    = $objConexaoLocalOrcamentos->getConexao();

        $this->query = "
            SELECT
                *
            FROM
                atividades_comuns                
            order by
                ds_atividade asc
        ";

        $arrValores = $objIMConexaoBancoDados->query($this->query);

        foreach ($arrValores as $key => $value) 
        {
            $arrNovo[$value['cd_atividade']] = $value['ds_atividade'];
        }

        return $arrNovo;        
    }
}