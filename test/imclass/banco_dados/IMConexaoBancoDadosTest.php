<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMConexaoBancoDados;
use imclass\banco_dados\IMConexaoBancoDadosPDO;
use imclass\banco_dados\IMConexaoAtributos;

class IMConexaoBancoDadosTest extends \PHPUnit_Framework_TestCase
{
    public function testconectar()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $objIMConexaoBancoDadosPDO->conectar( $this->getAtributosOK() );

        $objIMConexaoBancoDados = new IMConexaoBancoDados( $objIMConexaoBancoDadosPDO );
        $retorno = $objIMConexaoBancoDados->conectar( $this->getAtributosOK() );

        $this->assertTrue( $retorno );

        // untested
        $objIMConexaoBancoDados->setIsConnected( false );
        $objIMConexaoBancoDados->setMensagemErro( 'false' );
        $objIMConexaoBancoDados->getMensagemErro();

        $this->assertFalse( $objIMConexaoBancoDados->getIsConnected() );
    }

    public function testgetObjConexaobancoDados()
    {
        $objIMConexaoBancoDados = new IMConexaoBancoDados( new IMConexaoBancoDadosPDO() );

        $this->assertEquals(
            'imclass\banco_dados\IMConexaoBancoDadosPDO',
            get_class( $objIMConexaoBancoDados->getObjConexaobancoDados() )
        );
    }


    public function testquery()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $objIMConexaoBancoDados = new IMConexaoBancoDados( $objIMConexaoBancoDadosPDO );
        $objIMConexaoBancoDados->conectar( $this->getAtributosOK() );

        $result = $objIMConexaoBancoDados->executar( "truncate table test_im_memoria_temp" );
        $result = $objIMConexaoBancoDados->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoBancoDados->query( "select id from test_im_memoria_temp limit 1" );


        $arr = array(
            0 => array(
                'id' => '1'
            )
        );

        $this->assertEquals( $arr, $result );
    }


    public function testOfexecuta()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $objIMConexaoBancoDados = new IMConexaoBancoDados( $objIMConexaoBancoDadosPDO );
        $objIMConexaoBancoDados->conectar( $this->getAtributosOK() );

        $result = $objIMConexaoBancoDados->executar( "truncate table test_im_memoria_temp" );

        $result = $objIMConexaoBancoDados->executar(
            "insert into test_im_memoria_temp (
                          id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                          1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoBancoDados->executar( "delete from test_im_memoria_temp where  id = 1" );
        $this->assertEquals( 1, $result );


        $objIMConexaoBancoDados->executar( "truncate table test_im_memoria_temp" );
    }


    public function testOfgetLastInsertId()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $objIMConexaoBancoDados = new IMConexaoBancoDados( $objIMConexaoBancoDadosPDO );
        $objIMConexaoBancoDados->conectar( $this->getAtributosOK() );

        $result = $objIMConexaoBancoDados->executar( "truncate table test_im_memoria_temp" );
        $result = $objIMConexaoBancoDados->executar(
            "insert into test_im_memoria_temp (
                          id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                          1, 'teste', 'teste', 'teste', now() )"
        );

        $this->assertEquals( 1, $objIMConexaoBancoDados->getLastInsertId() );

        $objIMConexaoBancoDados->executar( "truncate table test_im_memoria_temp" );
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
}

?>