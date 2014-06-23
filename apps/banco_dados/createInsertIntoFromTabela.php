<?
use imclass\apps\AppConcreto;

use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;

use imclass\uteis\base\IMGetConexaoBancoFromNome;

class createInsertIntoFromTabela extends AppConcreto
{
    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setDescricao('Cria um insert into baseado no nome de uma tabela');
        $this->setCampos();
    }

    /**
     * Cria os campos necessarios
     */
    public function setCampos()
    {
        $objInputText = new InputText();
        $objInputText->setNome('ds_nome_tabela');
        $objInputText->setLabel('Nome Tabela');

        $this->getObjAppInputs()
            ->addInput($objInputText);

        $objInputConexoesMysql = new InputConexoesMysql();
        $objInputConexoesMysql->setNome('nm_obj_conexao');

        $this->getObjAppInputs()
            ->addInput($objInputConexoesMysql);            
    }

    /**
     * Executa a funcao
     */
    public function executar()
    {        
        $ds_nome_tabela = $this->getObjAppInputs()
            ->getInputValor('ds_nome_tabela');

        $nm_obj_conexao = $this->getObjAppInputs()
            ->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
        $objIMConexaoAtributos = $objIMConexaoBancoDados->getobjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        if ($objIMConexaoBancoDados != null) {
            $this->query = "
                SHOW COLUMNS FROM $ds_nome_tabela;
             ";

            $arrValores = $objIMConexaoBancoDados->query($this->query);

            foreach ($arrValores as $key => $valor) 
            {
                $arrNovo[]   = '\'valor' .  $key .'\'';
                $arrCampos[] = '@' . $valor['Field'];
                $arrFields[] = $valor['Field'];
            }

            $query = '';

            foreach ($arrFields as $key => $valor) 
            {
                $query .= 'set @'. $valor . ' = "valor";<BR>';
            }

            $query .= "<BR>";
            $query .= "insert into $ds_nome_tabela (";
            $query .= implode( ', ', $arrFields );
            $query .= ') values (';
            $query .= implode( ', ', $arrCampos );
            $query .= ' );<BR><BR>';

            $query .= "insert into $ds_nome_tabela (";
            $query .= implode( ', ', $arrFields );
            $query .= ') values (';
            $query .= implode( ', ', $arrNovo );
            $query .= ' );';

            
            $this->setResultado( $query );            
        }
    }

    public function getResultadoOutput()
    {
        return $this->getResultado();
    }
}
?>