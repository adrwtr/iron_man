<?php
namespace imclass\banco_dados;

use imclass\banco_dados\IMConexaoAtributos;

/**
 * Classe que le um arquivo html. Este arquivo precisa executar uma instrução
 * em um banco de dados utilizando o php 4 para conexões antigas de mysql
 * o resultado deve ser retornado como uma consulta de banco de dados
 */
class IMConexaoFopenPHP implements iConexaobancoDados
{

    private $isConnected;
    private $mensagem_erro;
    private $handle_arquivo;
    private $objIMConexaoAtributos;

    public function getURL()
    {
        return 'http://localhost/adriano/executa_sql.php'; // trab
        // return 'http://localhost:8081/git/iron_man/externos/im/executa_sql.php'; // adriano
        // return 'http://localhost/git/iron_man/externos/im/executa_sql.php'; // jak
    }


    /**
     * Abre um arquivo html com fopen. Se for possivel ler
     * a conexao é estabelecida
     *
     * @param  [IMConexaoAtributos] $objIMConexaoAtributos [Atributos de conexao]
     * @return bool [IMPDOStatement] [IMErro]
     */
    public function conectar( IMConexaoAtributos $objIMConexaoAtributos = null )
    {
        $this->setIsConnected( false );

        if ($objIMConexaoAtributos != null) {
            $this->setobjIMConexaoAtributos( $objIMConexaoAtributos );

            $url = $this->getURLTesteConexao();
            $this->handle_arquivo = fopen( $url, "r" );
            $conteudo = stream_get_contents( $this->handle_arquivo );

            if ($this->handle_arquivo != null && $conteudo == 'true') {
                $this->setIsConnected( true );
                fclose( $this->handle_arquivo );
                return true;
            }
        }

        return false;
    }

    /**
     * retorna a conexao que será usada como url
     * @return string
     */
    public function getUrlConexao()
    {
        $url = $this->getURL();
        $url .= '?host=' . $this->getobjIMConexaoAtributos()->getHost();
        $url .= '&login=' . $this->getobjIMConexaoAtributos()->getLogin();
        $url .= '&senha=' . $this->getobjIMConexaoAtributos()->getSenha();
        $url .= '&banco=' . $this->getobjIMConexaoAtributos()->getBanco();

        return $url;
    }

    /**
     * Teste de conexao como url
     * @return string
     */
    public function getURLTesteConexao()
    {
        $url = $this->getUrlConexao();
        $url .= '&testa_conexao=1';

        return $url;
    }

    /**
     * Executa a query e retorna resultado
     *
     * @param  string $query      [description]
     * @return [array]
     */
    public function query( $query = '' )
    {
        if ($this->getIsConnected()) {
            $url = $this->getUrlConexao();
            $query = $this->tratarQuery( $query );
            $url .= '&query=' . $query;
            $this->handle_arquivo = fopen( $url, "r" );
            $conteudo = stream_get_contents( $this->handle_arquivo );

            $arrValores = @eval( $conteudo );

            /*$error = error_get_last();
            echo "<HR>";
            vl( $error );*/
            // myErrorHandler( $error['type'], $error['message'], $error['file'], $error['line'], null );

            return $arrValores;
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
            $url = $this->getUrlConexao();
            $query = $this->tratarQuery( $query );
            $url .= '&executar=' . $query;
            $this->handle_arquivo = fopen( $url, "r" );
            $conteudo = stream_get_contents( $this->handle_arquivo );

            return $conteudo;
        }

        return 0;
    }

    /**
     * Retorna o último id inserido
     * Não funciona nesta versão pois o fopen abre uma nova instancia do mysql a cada comando
     * @return int
     */
    public function getLastInsertId()
    {
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
     * Seta as variaveis de conexao
     * @param  [type] $objIMConexaoAtributos [description]
     */
    private function setobjIMConexaoAtributos( $objIMConexaoAtributos )
    {
        $this->objIMConexaoAtributos = $objIMConexaoAtributos;
    }

    /**
     * Retorna as variaveis de conexao
     * @return IMConexaoAtributos
     */
    private function getobjIMConexaoAtributos()
    {
        return $this->objIMConexaoAtributos;
    }

    /**
     * Trata a query para ser passada por url
     * @param  [str] $str [description]
     * @return [str]      [description]
     */
    private function tratarQuery( $str )
    {
        $str = str_replace( "\n", "", $str );
        $str = str_replace( "\t", "", $str );
        $str = urlencode( $str );

        return $str;
    }

}

?>