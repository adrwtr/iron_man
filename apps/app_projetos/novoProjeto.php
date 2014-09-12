<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\link\LinkCampo;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputHidden;

use info_data\base\ConexaoLocalOrcamentos;


/**
 * Cadastra um projeto no banco
 */
class novoProjeto extends AppConcreto
{
    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Cadastra um projeto no banco');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('ds_projeto');
        $objInputText->setLabel('Nome do Projeto');

        $this->getObjAppInputs()
            ->addInput($objInputText);

        $objInputHidden = new InputHidden();
        $objInputHidden->setNome('sn_executar');
        $objInputHidden->setValor(1);

        $this->getObjAppInputs()
            ->addInput($objInputHidden);
    }

    /**
     * seta os possiveis retornos que esta classe pode fazer
     * para outra classe
     */
    public function setLinkRetornos()
    {
        
    }

    /**
     * Executa a função
     */
    public function executar()
    {
        $ds_projeto = $this->getObjAppInputs()
            ->getInputValor('ds_projeto');

        $sn_executar = $this->getObjAppInputs()
            ->getInputValor('sn_executar');

        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados = $objConexaoLocalOrcamentos->getConexao();

        if ($objIMConexaoBancoDados != null && $sn_executar == 1) {
            $this->query = "insert into projetos ( ds_projeto, dt_projeto ) value (
                '". $ds_projeto ."', now()
            );
            ";

            $arrValores = $objIMConexaoBancoDados->executar(
                $this->query
            );            
            $this->setResultado("Projeto inserido");
        }
    }

    public function getResultadoOutput()
    {
        $html = $this->getResultado();
        
        $html .= "<BR> " . $this->query;
        $html .= "<HR>";

        return $html;
    }
}