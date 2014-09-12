<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\apps\inputs\InputSelectList;


use imclass\apps\link\LinkCampo;

use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;


/**
 * Recupera as tabelas de um banco de dados
 */
class getTabelasFromBanco extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->resultado = null;
        $this->setDescricao('Recupera as tabelas de um banco de dados');
        $this->setCampos();
        $this->setLinkRetornos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
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
        $ds_nome_tabela = $this->getObjAppInputs()->getInputValor('ds_nome_tabela');
        $nm_obj_conexao = $this->getObjAppInputs()->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
        $objIMConexaoAtributos = $objIMConexaoBancoDados->getObjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        if ($objIMConexaoBancoDados != null) {
            $query = "
            SHOW TABLES FROM $banco;
         ";

            $arrValores = $objIMConexaoBancoDados->query($query);
            $this->resultado = $arrValores;
        }

        return $this;
    }

    /**
     * retorna um resultado para a tela
     */
    public function getResultadoOutput()
    {
        $arrValores = $this->resultado;


        // este campo será utilizado pelo link retornos!
        $objInputSelectList = new InputSelectList();
        $objInputSelectList->setNome('ds_nome_tabela');

        foreach ($arrValores as $key => $value) {
            $valor = array_pop($value);
            $objInputSelectList->addValoresCampo($valor, $valor);
        }

        $html .= $objInputSelectList->getComponente();
        $html .= "<BR> " . $query;

        return $html;
    }

    /**
     * seta os possiveis retornos que esta classe pode fazer
     * para outra classe
     */
    public function setLinkRetornos()
    {
        $this->getObjAppLinks()
            ->addLinkCampo(
                new LinkCampo(
                    'getCamposFromTabela',
                    'apps/banco_dados/',
                    'ds_nome_tabela'
                )        
        );

        $this->getObjAppLinks()
            ->addLinkCampo(
                new LinkCampo(
                    'createInsertIntoFromTabela',
                    'apps/banco_dados/',
                    'ds_nome_tabela'
                )        
        );
    }
}

?>