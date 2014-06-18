<?php
namespace imclass\banco_dados;

use imclass\banco_dados\IMConexaoAtributos;

/**
 * Interface básica para qualquer conexao com banco de dados
 * essa interface irá indicar os comandos necessários utilizados pelo sistema
 * para fazer a leitura e escrita em um banco de dados padrao sql
 */
interface iConexaoBancoDados
{
    /**
     * realiza a conexao
     */
    public function conectar(IMConexaoAtributos $objIMConexaoAtributos = null);

    /**
     * executa a query e retorna alguma coisa
     */
    public function query($query = '');

    /**
     * executa um comando sql - insert - update - delete
     * @return [type] [description]
     */
    public function executar($query = '');

    /**
     * traz ultima chave primaria
     */
    public function getLastInsertId();

    /**
     * Esta conectado?
     */
    public function getIsConnected();

    public function setIsConnected($valor);

    /**
     * mensagem de errro
     */
    public function getMensagemErro();

    public function setMensagemErro();
}

?>