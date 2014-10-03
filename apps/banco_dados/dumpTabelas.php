<?
use imclass\apps\AppConcreto;

use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\uteis\base\IMGetConexaoBancoFromNome;
use Ifsnop\Mysqldump\Mysqldump;


/**
 * Realiza um dump das tabelas e salva em upload / dump
 */
class dumpTabelas extends AppConcreto
{

    private $ds_nome_dump;
    private $ds_path;

    /**
     * Construtor
     */
    public function __construct()
    {
        parent::__construct();
        $this->resultado = null;
        $this->setDescricao('Realiza o dump de tabelas separadas por virgula');
        $this->setCampos();
        $this->setLinkRetornos();
        $this->setDsPath('../upload/dump/');
        $this->setDsNomeDump('dump_'. date("d_m_Y h_i") . '.sql');
    }

    /**
     * Cria os campos necessários
     */
    public function setCampos()
    {
        // tabelas
        $objInputText = new InputText();
        $objInputText->setNome('ds_tabelas');
        $objInputText->setLabel('Tabelas separadas por virgula');

        $this->getObjAppInputs()
            ->addInput($objInputText);

        // conexao
        $objInputConexoesMysql = new InputConexoesMysql();
        $objInputConexoesMysql->setNome('nm_obj_conexao');
        $objInputConexoesMysql->setLabel('Conexão');

        $this->getObjAppInputs()
            ->addInput($objInputConexoesMysql);
    }

    private function getDumpSet($tabelas)
    {
        $valores = ( strpos(",", $tabelas) > 0 ? explode(",", $tabelas) : array( $tabelas ) );
        
        return array(
            'include-tables'             => $valores,
            'add-drop-table'             => true,
            'compress'                   => 'None',
            'no-data'                    => false,
            'single-transaction'         => true,
            'lock-tables'                => false,
            'add-locks'                  => true,
            'extended-insert'            => false,
            'disable-keys'               => false,
            'disable-foreign-keys-check' => false,
            'where'                      => '',
            'no-create-info'             => false,
            'skip-triggers'              => false,
            'add-drop-trigger'           => false,
            'hex-blob'                   => true,
            'databases'                  => false,
            'add-drop-database'          => false
        );
    }

    /**
     * Executa a função
     */
    public function executar()
    {
        $retorno        = '';
        $ds_tabelas     = $this->getObjAppInputs()->getInputValor('ds_tabelas');
        $nm_obj_conexao = $this->getObjAppInputs()->getInputValor('nm_obj_conexao');

        $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao($nm_obj_conexao);
        $objIMConexaoAtributos  = $objIMConexaoBancoDados->getObjIMConexaoAtributos();
        $banco = $objIMConexaoAtributos->getBanco();

        try {
            $objMysqlDump = new Mysqldump(
                $objIMConexaoAtributos->getBanco(), 
                $objIMConexaoAtributos->getLogin(), 
                $objIMConexaoAtributos->getSenha(),
                $objIMConexaoAtributos->getHost(),
                'mysql',
                $this->getDumpSet($ds_tabelas)
            );
            
            $objMysqlDump->start( 
                $this->getDsPath() . $this->getDsNomeDump()
            );

        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }

        $this->setResultado($ds_tabelas);

        return $this;
    }

    /**
     * retorna um resultado para a tela
     */
    public function getResultadoOutput()
    {
        $html = 'Dump criado em upload/dump com o nome: ' . $this->getDsNomeDump() . "<BR> Para as tabelas " . $this->getResultado() ;

        return $html;
    }

    /**
     * seta os possiveis retornos que esta classe pode fazer
     * para outra classe
     */
    public function setLinkRetornos()
    {
        
    }

    public function setDsNomeDump($v)
    {
        $this->ds_nome_dump = $v;
    }

    public function getDsNomeDump()
    {
        return $this->ds_nome_dump;
    }

    public function setDsPath($v)
    {
        $this->ds_path = $v;
    }

    public function getDsPath()
    {
        return $this->ds_path;
    }
}

?>