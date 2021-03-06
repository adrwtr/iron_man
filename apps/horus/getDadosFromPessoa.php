<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

/**
 * Recupera os dados de uma pessoa baseado em um codigo
 * ou nome
 * ou cpf
 * ou email
 */
class getDadosFromPessoa extends AppConcreto
{

    var $query;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Recupera os dados de uma pessoa baseado em um codigo - ou nome - ou cpf - ou email');
        $this->setCampos();
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('cd_pessoa');
        $objInputText->setLabel('Código da Pessoa');
        $this->getObjAppInputs()->addInput($objInputText);

        $objInputText = new InputText();
        $objInputText->setNome('ds_cpf');
        $objInputText->setLabel('CPF');
        $this->getObjAppInputs()->addInput($objInputText);

        $objInputText = new InputText();
        $objInputText->setNome('ds_email');
        $objInputText->setLabel('Email');
        $this->getObjAppInputs()->addInput($objInputText);

        $objInputText = new InputText();
        $objInputText->setNome('ds_nome');
        $objInputText->setLabel('Nome');
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
        $retorno   = '';
        $cd_pessoa = $this->getObjAppInputs()
            ->getInputValor('cd_pessoa');

        $ds_cpf    = $this->getObjAppInputs()
            ->getInputValor('ds_cpf');

        $ds_email  = $this->getObjAppInputs()
            ->getInputValor('ds_email');

        $ds_nome   = $this->getObjAppInputs()
            ->getInputValor('ds_nome');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);

        if ($objIMConexaoBancoDados != null) {
            $this->query = '
            select
               uni_p.cd_pessoa,
               uni_p.nm_pessoa,
               uni_p.ds_cpf,
               uni_p.ds_login,
               c.ds_contato

            from
               pessoas as uni_p

               LEFT JOIN contatos_pessoas as c ON (
                  c.cd_pessoa = uni_p.cd_pessoa
               )

            where
            ';

            $anterior = false;

            if ($cd_pessoa != '') {
                $anterior = true;
                $this->query .= '
                  uni_p.cd_pessoa = "' . $cd_pessoa . '" 
               ';
            }

            if ($cd_cpf != '') {

                if ( $anterior == true )
                {
                    $this->query .= ' or ';                    
                }

                $this->query .= '
                  uni_p.ds_cpf    = "' . $cd_cpf . '"
                ';
                $anterior = true;
            }

            if ($ds_email != '') {

                if ( $anterior == true )
                {
                    $this->query .= ' or ';                    
                }

                $this->query .= '
                  c.ds_contato    like "%' . $ds_email . '%" 
               ';
                $anterior = true;
            }


            if ($ds_nome != '') {

                if ( $anterior == true )
                {
                    $this->query .= ' or ';                    
                }

                $this->query .= '
                  uni_p.nm_pessoa like "%' . $ds_nome . '%"
               '; 

            }

            $this->query .= '   
            order by
               uni_p.nm_pessoa

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