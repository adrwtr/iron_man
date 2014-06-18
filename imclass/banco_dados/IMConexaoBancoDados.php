<?php
namespace imclass\banco_dados;

use imclass\banco_dados\iConexaobancoDados;

/**
 * Classe que representa uma conexão com banco de dados generica
 * é um utilizador de outra classe base
 */
class IMConexaoBancoDados implements iConexaobancoDados
{

    private $objiConexaobancoDados;

    public function __construct(iConexaobancoDados $objBase)
    {
        $this->objiConexaobancoDados = $objBase;
    }

    /**
     * realiza a conexao
     * @param  [IMConexaoAtributos] $objIMConexaoAtributos [Atributos de conexao]
     * @return bool
     */
    public function conectar(IMConexaoAtributos $objIMConexaoAtributos = null)
    {
        return $this->objiConexaobancoDados
            ->conectar($objIMConexaoAtributos);
    }

    /**
     * Executa a query e retorna resultado
     *
     * @param  string $query      [description]
     * @return [array ou bool]   [IMPDOStatement]
     */
    public function query($query = '')
    {
        return $this->objiConexaobancoDados
            ->query($query);
    }

    /**
     * Apenas executa a query
     *
     * @param  string $query [description]
     * @return [int]         [quantos registros alterados]
     */
    public function executar($query = '')
    {
        return $this->objiConexaobancoDados
            ->executar($query);
    }

    /**
     * Retorna o último id inserido
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->objiConexaobancoDados
            ->getLastInsertId();
    }

    /**
     * Indica se está conectado
     * @return boolean
     */
    public function getIsConnected()
    {
        return $this->objiConexaobancoDados
            ->getIsConnected();
    }

    /**
     * Seta se está conectado
     * @param boolean $isConnected
     */
    public function setIsConnected($isConnected)
    {
        $this->objiConexaobancoDados
            ->setIsConnected($isConnected);
    }

    /**
     * Tem mensagem de erro? Qual é?
     * @return string
     */
    public function getMensagemErro()
    {
        return $this->objiConexaobancoDados
            ->getMensagemErro();
    }

    /**
     * Seta a mensagem de erro
     * @param string
     */
    public function setMensagemErro($valor = '')
    {
        $this->objiConexaobancoDados
            ->setMensagemErro($valor);
    }


    /**
     * Retorna o objeto de conexao original
     * @return [iConexaobancoDados] [description]
     */
    public function getObjConexaobancoDados()
    {
        return $this->objiConexaobancoDados;
    }
}

?>