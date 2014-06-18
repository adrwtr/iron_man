<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMConexaoBancoDadosPDO;
use imclass\banco_dados\IMConexaoAtributos;

class IMConexaoBancoDadosPDOTest extends \PHPUnit_Framework_TestCase
{

    public function testconectar()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $retorno = $objIMConexaoBancoDadosPDO->conectar($this->getAtributosOK());
        $this->assertTrue($retorno);
    }

    public function testconectarError()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $retorno = $objIMConexaoBancoDadosPDO->conectar($this->getAtributosFalho());

        $this->assertFalse($retorno);

        $this->assertEquals(
            'SQLSTATE[HY000] [1045] Access denied for user',
            substr($objIMConexaoBancoDadosPDO->getMensagemErro(), 0, 45)
        );

        $this->assertEquals(0, $objIMConexaoBancoDadosPDO->executar(''));
        $this->assertEquals(false, $objIMConexaoBancoDadosPDO->query(''));
        $this->assertEquals(null, $objIMConexaoBancoDadosPDO->getLastInsertId());
    }


    public function testquery()
    {
        $objIMConexaoBancoDadosPDO = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoBancoDadosPDO->executar("truncate table test_im_memoria_temp");
        $result = $objIMConexaoBancoDadosPDO->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoBancoDadosPDO->query("select id from test_im_memoria_temp limit 1");


        $arr = array(
            0 => array(
                'id' => '1'
            )
        );

        $this->assertEquals($arr, $result);
    }


    public function testOfexecuta()
    {
        $objIMConexaoBancoDadosPDO = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoBancoDadosPDO->executar("truncate table test_im_memoria_temp");

        $result = $objIMConexaoBancoDadosPDO->executar(
            "insert into test_im_memoria_temp (
                          id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                          1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoBancoDadosPDO->executar("delete from test_im_memoria_temp where  id = 1");

        $this->assertEquals(1, $result);

        $objIMConexaoBancoDadosPDO->executar("truncate table test_im_memoria_temp");
    }


    public function testOfgetLastInsertId()
    {
        $objIMConexaoBancoDadosPDO = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoBancoDadosPDO->executar("truncate table test_im_memoria_temp");
        $result = $objIMConexaoBancoDadosPDO->executar(
            "insert into test_im_memoria_temp (
                          id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                          1, 'teste', 'teste', 'teste', now() )"
        );

        $this->assertEquals(1, $objIMConexaoBancoDadosPDO->getLastInsertId());

        $objIMConexaoBancoDadosPDO->executar("truncate table test_im_memoria_temp");
    }

    public function getAtributosOK()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco("Teste UNITTEST");
        $objIMConexaoAtributos->setLogin("moodle");
        $objIMConexaoAtributos->setSenha("moodle");
        $objIMConexaoAtributos->setBanco("adriano");
        $objIMConexaoAtributos->setHost("localhost");
        $objIMConexaoAtributos->setPorta("");

        return $objIMConexaoAtributos;
    }

    public function getConexaoParaTesteOK()
    {
        $objIMConexaoBancoDadosPDO = new IMConexaoBancoDadosPDO();
        $objIMConexaoBancoDadosPDO->conectar($this->getAtributosOK());

        return $objIMConexaoBancoDadosPDO;
    }


    public function getAtributosFalho()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco("unimestre");
        $objIMConexaoAtributos->setLogin("aaa");
        $objIMConexaoAtributos->setSenha("aaa");
        $objIMConexaoAtributos->setBanco("adriano");
        $objIMConexaoAtributos->setHost("localhost");
        $objIMConexaoAtributos->setPorta("");

        return $objIMConexaoAtributos;
    }
}

?>