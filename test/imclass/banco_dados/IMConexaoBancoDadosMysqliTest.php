<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMConexaoBancoDadosMysqli;
use imclass\banco_dados\IMConexaoAtributos;

class IMConexaoBancoDadosMysqliTest extends \PHPUnit_Framework_TestCase
{

    public function testconectar()
    {
        $objIMConexaoBancoDadosMysqli = new IMConexaoBancoDadosMysqli();
        $retorno = $objIMConexaoBancoDadosMysqli->conectar( $this->getAtributosOK() );
        $this->assertTrue( $retorno );
    }

    public function testconectarError()
    {
        $objIMConexaoBancoDadosMysqli = new IMConexaoBancoDadosMysqli();
        $retorno = $objIMConexaoBancoDadosMysqli->conectar( $this->getAtributosFalho() );

        $this->assertFalse( $retorno );

        $this->assertEquals(
            'mysql_connect(): Access denied for user',
            substr( $objIMConexaoBancoDadosMysqli->getMensagemErro(), 0, 39 )
        );

        $this->assertFalse( $objIMConexaoBancoDadosMysqli->query( '' ) );
        $this->assertEquals( 0, $objIMConexaoBancoDadosMysqli->executar( '' ) );
        $this->assertEquals( null, $objIMConexaoBancoDadosMysqli->getLastInsertId() );
    }


    public function testquery()
    {
        $objIMConexaoBancoDadosMysqli = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoBancoDadosMysqli->executar( "truncate table test_im_memoria_temp" );
        $result = $objIMConexaoBancoDadosMysqli->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoBancoDadosMysqli->query( "select id from test_im_memoria_temp limit 1" );

        $arr = array(
            0 => array(
                'id' => '1'
            )
        );

        $this->assertEquals( $arr, $result );

        // testa erro
        $result = $objIMConexaoBancoDadosMysqli->query( "select blablabla" );
        $this->assertFalse( $result );
    }


    public function testOfexecuta()
    {
        $objIMConexaoBancoDadosMysqli = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoBancoDadosMysqli->executar( "truncate table test_im_memoria_temp" );

        $result = $objIMConexaoBancoDadosMysqli->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoBancoDadosMysqli->executar( "delete from test_im_memoria_temp where  id = 1" );

        $this->assertEquals( 1, $result );

        $objIMConexaoBancoDadosMysqli->executar( "truncate table test_im_memoria_temp" );
    }


    public function testOfgetLastInsertId()
    {
        $objIMConexaoBancoDadosMysqli = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoBancoDadosMysqli->executar( "truncate table test_im_memoria_temp" );
        $result = $objIMConexaoBancoDadosMysqli->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     null, 'teste', 'teste', 'teste', now() )"
        );

        $this->assertEquals( 1, $objIMConexaoBancoDadosMysqli->getLastInsertId() );

        $objIMConexaoBancoDadosMysqli->executar( "truncate table test_im_memoria_temp" );
    }

    public function getAtributosOK()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco( "Teste UNITTEST" );
        $objIMConexaoAtributos->setLogin( "moodle" );
        $objIMConexaoAtributos->setSenha( "moodle" );
        $objIMConexaoAtributos->setBanco( "adriano" );
        $objIMConexaoAtributos->setHost( "localhost" );
        $objIMConexaoAtributos->setPorta( "" );

        return $objIMConexaoAtributos;
    }

    public function getAtributosFalho()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco( "unimestre" );
        $objIMConexaoAtributos->setLogin( "aaa" );
        $objIMConexaoAtributos->setSenha( "aaa" );
        $objIMConexaoAtributos->setBanco( "adriano" );
        $objIMConexaoAtributos->setHost( "localhost" );
        $objIMConexaoAtributos->setPorta( "" );

        return $objIMConexaoAtributos;
    }

    public function getConexaoParaTesteOK()
    {
        $objIMConexaoBancoDadosMysqli = new IMConexaoBancoDadosMysqli();
        $objIMConexaoBancoDadosMysqli->conectar( $this->getAtributosOK() );

        return $objIMConexaoBancoDadosMysqli;
    }
}

?>