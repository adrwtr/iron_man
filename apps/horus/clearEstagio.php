<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;

class clearEstagio extends AppConcreto
{

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Apaga um estágio e todas as suas tabelas dependentes de uma pessoa em uma conexão');
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

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao(
            $nm_obj_conexao
        );

        if ($objIMConexaoBancoDados != null) {
            $query[ ] = "
         DELETE FROM estnc_titulos_visualizados where cd_titulo in ( select cd_titulo from estnc_titulos where cd_estagio in (
         $cd_estagio
          ) );
         ";

            $query[ ] = "
         DELETE FROM estnc_impressoes_aviso where cd_titulo in ( select cd_titulo from estnc_titulos where cd_estagio in (
            $cd_estagio
         ) );
         ";

            $query[ ] = "
         DELETE FROM estnc_avaliacoes_deferidas where cd_estagio in ( $cd_estagio );
         ";

            $query[ ] = "
         DELETE FROM estnc_avaliacoes_respondidas where cd_estagio in ( $cd_estagio );
         ";

            $query[ ] = "
         DELETE FROM estnc_avaliacoes_agendar where cd_estagio in ( $cd_estagio );
         ";

            $query[ ] = "
         DELETE FROM estnc_estagios where cd_vaga_origem in ( $cd_estagio);
         ";

            $query[ ] = "
         DELETE FROM estnc_titulos_departamentos where cd_titulo in ( select cd_titulo from estnc_titulos where cd_estagio in (
            $cd_estagio
         ) );
         ";

            $query[ ] = "
         DELETE FROM estnc_titulos_horarios where cd_estagio in (
            $cd_estagio
          );
         ";

            $query[ ] = "
         DELETE FROM estnc_titulos where cd_estagio in ( SELECT cd_estagio FROM estnc_estagios where cd_vaga_origem in (
          $cd_estagio
          ) );
         ";

            $query[ ] = "
         DELETE FROM estnc_titulos where cd_estagio in (
            $cd_estagio
          );
         ";

            $query[ ] = "
         DELETE FROM estnc_estagios where cd_estagio in (
            $cd_estagio
         );
         ";

            foreach ($query as $id => $v) {
                $retorno .= $v . "<BR>";
                $objIMConexaoBancoDados->executar($v);
            }

            $this->setResultado($retorno);
        }
    }

    public function getResultadoOutput()
    {
        return $this->getResultado();
    }
}

?>