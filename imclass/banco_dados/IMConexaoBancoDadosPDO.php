<?php
namespace imclass\banco_dados;

use imclass\banco_dados\iConexaobancoDados;
use imclass\banco_dados\IMConexaoAtributos;
use imclass\imphp\IMPDOStatement;

/**
 * Classe que representa uma conexão PDO com o banco de dados
 * Abstração de banco de dados
 */
class IMConexaoBancoDadosPDO implements iConexaobancoDados
{

    private $objPDO;
    private $isConnected;
    private $mensagem_erro;
    private $arrValores;
    private $objIMConexaoAtributos;

    public function __construct()
    {
        $this->objPDO = null;
        $this->setIsConnected( false );
        $this->setMensagemErro( '' );
    }

    /**
     * Conecta com mysql
     *
     * @param  [IMConexaoAtributos] $objIMConexaoAtributos [Atributos de conexao]
     * @return bool
     */
    public function conectar( IMConexaoAtributos $objIMConexaoAtributos = null )
    {
        try {
            if ($objIMConexaoAtributos != null) {
                // guarda atributos de conexao
                $this->setobjIMConexaoAtributos( $objIMConexaoAtributos );

                // conecta com o banco
                $this->objPDO = new \PDO(
                    $objIMConexaoAtributos->getPDOMysqlString(),
                    $objIMConexaoAtributos->getLogin(),
                    $objIMConexaoAtributos->getSenha()
                );

                $this->setIsConnected( true );
                return true;
            }
        } catch ( \PDOException $e ) {
            $this->setMensagemErro( $e->getMessage() );
            $this->setIsConnected( false );
        }

        return false;
    }


    /**
     * Executa a query e retorna resultado
     *
     * @param  string $query      [description]
     * @return [array ou bool]   [IMPDOStatement]
     */
    public function query( $query = '' )
    {
        if ($this->getIsConnected()) {
            $objPDOStatement = $this->objPDO->prepare( $query );
            $objPDOStatement->execute();
            $this->arrValores = $objPDOStatement->fetchAll( \PDO::FETCH_ASSOC );
            $objPDOStatement->closeCursor();

            return $this->getArrValores();
        }

        return false;
    }

    /**
     * Apenas executa a query
     *
     * @param  string $query [description]
     * @return [int]         [quantos registros alterados]
     */
    public function executar( $query = '' )
    {
        if ($this->getIsConnected()) {
            $contador = $this->objPDO->exec( $query );

            return $contador;
        }

        return 0;
    }

    /**
     * Retorna o último id inserido
     * @return int
     */
    public function getLastInsertId()
    {
        if ($this->getIsConnected()) {
            return $this->objPDO->lastInsertId();
        }

        return null;
    }

    /**
     * Indica se está conectado
     * @return boolean
     */
    public function getIsConnected()
    {
        return $this->isConnected;
    }

    /**
     * Seta se está conectado
     * @param boolean $isConnected
     */
    public function setIsConnected( $isConnected )
    {
        $this->isConnected = $isConnected;
    }

    /**
     * Tem mensagem de erro? Qual é?
     * @return string
     */
    public function getMensagemErro()
    {
        return $this->mensagem_erro;
    }

    /**
     * Seta a mensagem de erro
     * @param string
     */
    public function setMensagemErro( $valor = '' )
    {
        $this->mensagem_erro = $valor;
    }

    /**
     * Retorna os valores de uma query
     * @return [array]
     */
    public function getArrValores()
    {
        return $this->arrValores;
    }

    /**
     * Seta o objeto de atributos de conexao
     * @param  [IMConexaoAtributos] $objIMConexaoAtributos [description]
     * @return this
     */
    public function setobjIMConexaoAtributos( $objIMConexaoAtributos )
    {
        $this->objIMConexaoAtributos = $objIMConexaoAtributos;
        return $this;
    }

    /**
     * Retorna o objeto de atributos de conexao
     * @return IMConexaoAtributos
     */
    public function getobjIMConexaoAtributos()
    {
        return $this->objIMConexaoAtributos;
    }
}

?>