<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\link\LinkCampo;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputSelectList;
use imclass\apps\inputs\InputHidden;

use info_data\base\ConexaoLocalOrcamentos;


/**
 * Cadastra um pacote no projeto 
 */
class addPacoteProjeto extends AppConcreto
{
    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Cadastra um pacote no projeto ');
        $this->setCampos();     
        $this->setLinkRetornos();   
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('ds_pacote');
        $objInputText->setLabel('Nome do Pacote');

        $this->getObjAppInputs()
            ->addInput($objInputText);


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
        $cd_projeto = $this->getObjAppInputs()
            ->getInputValor('cd_projeto');

        $ds_pacote = $this->getObjAppInputs()
            ->getInputValor('ds_pacote');

        $sn_executar = $this->getObjAppInputs()
            ->getInputValor('sn_executar');
            
        $objConexaoLocalOrcamentos = new ConexaoLocalOrcamentos();
        $objIMConexaoBancoDados = $objConexaoLocalOrcamentos->getConexao();

        if ($objIMConexaoBancoDados != null && $sn_executar == 1) {
            $this->query = "insert into pacotes ( cd_projeto, ds_pacote ) value (
                '". $cd_projeto ."', '". $ds_pacote ."'
            );
            ";

            $arrValores = $objIMConexaoBancoDados->executar(
                $this->query
            );            

            $cd_pacote = $objIMConexaoBancoDados->getLastInsertId();
            $this->setResultado( $cd_pacote );
        }
    }

    public function getResultadoOutput()
    {
        $html = $this->getResultado();
        
        $html .= "<BR> " . $this->query;
        $html .= "<HR>";

        $objInputHidden = new InputHidden();
        $objInputHidden->setNome('cd_pacote');
        $objInputHidden->setValor('2');

        $html .= $objInputHidden->getComponente();

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