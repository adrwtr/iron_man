<?php
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;

class clearPessoaImportada extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Apaga uma pessoa que foi importada');
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

        $this->getObjAppInputs()
             ->addInput($objInputText);

        $objInputText = new InputText();
        $objInputText->setNome('ds_cpf');
        $objInputText->setLabel('CPF da Pessoa');

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

        $cd_pessoa = $this->getObjAppInputs()
            ->getInputValor('cd_pessoa');

        $ds_cpf = $this->getObjAppInputs()
            ->getInputValor('ds_cpf');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao(
            $nm_obj_conexao
        );

        if ($objIMConexaoBancoDados != null) {
            $this->query = '
            select
                p.cd_pessoa
            from
               pessoas as p
            where
            ';

            if ( $cd_pessoa != '' )
            {
                $this->query .= '  p.cd_pessoa = \''. $cd_pessoa .'\'  ';
            }

            if ( $ds_cpf != '' )
            {
               $this->query .= 'p.ds_cpf = \''. $ds_cpf .'\' ';
            }

            $this->query .= '
            order by
               p.cd_pessoa
            asc limit 1
            ';

            $retorno .= $this->query . "<BR>"; 

            $arrValores = $objIMConexaoBancoDados->query($this->query);
            $cd_pessoa = $arrValores[0]['cd_pessoa'];
            
            if ($objIMConexaoBancoDados != null) {
                $query[ ] = "
                    DELETE FROM estnc_matriculas WHERE cd_pessoa = $cd_pessoa;
                ";

                $query[ ] = "
                    DELETE FROM estnc_importacao_informacao WHERE cd_pessoa_importada = $cd_pessoa;
                ";

                $query[ ] = "
                    DELETE FROM estnc_alunos WHERE cd_pessoa = $cd_pessoa;
                ";

                $query[ ] = "
                    DELETE FROM pessoas WHERE cd_pessoa='$cd_pessoa';
                ";

                foreach ($query as $id => $v) {
                    $retorno .= $v . "<BR>";
                    $objIMConexaoBancoDados->executar($v);
                }

                $this->setResultado($retorno);
            }
        }
    }

    public function getResultadoOutput()
    {
        return $this->getResultado();
    }
}

?>