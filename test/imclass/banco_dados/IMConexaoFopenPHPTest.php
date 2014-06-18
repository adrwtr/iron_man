<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMConexaoFopenPHP;
use imclass\banco_dados\IMConexaoAtributos;

class IMConexaoFopenPHPTest extends \PHPUnit_Framework_TestCase
{

    public function testconectar()
    {
        $objIMConexaoFopenPHP = new IMConexaoFopenPHP();
        $retorno = $objIMConexaoFopenPHP->conectar($this->getAtributosOK());
        $this->assertTrue($retorno);
    }

    public function testconectarError()
    {
        $objIMConexaoFopenPHP = new IMConexaoFopenPHP();
        $retorno = $objIMConexaoFopenPHP->conectar($this->getAtributosFalho());

        $this->assertFalse($retorno);

        $this->assertEquals(0, $objIMConexaoFopenPHP->executar(''));
        $this->assertEquals(false, $objIMConexaoFopenPHP->query(''));
        $this->assertEquals(null, $objIMConexaoFopenPHP->getLastInsertId());
    }


    public function testOfexecuta()
    {
        $objIMConexaoFopenPHP = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoFopenPHP->executar("truncate table test_im_memoria_temp");
        $result = $objIMConexaoFopenPHP->executar(
            "insert into test_im_memoria_temp (
                          id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                          1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoFopenPHP->executar("delete from test_im_memoria_temp where  id = 1");

        $this->assertEquals(1, $result);

        $objIMConexaoFopenPHP->executar("truncate table test_im_memoria_temp");
    }


    public function testquery()
    {
        $objIMConexaoFopenPHP = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoFopenPHP->executar("truncate table test_im_memoria_temp");
        $result = $objIMConexaoFopenPHP->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     1, 'teste', 'teste', 'teste', now() )"
        );
        $result = $objIMConexaoFopenPHP->query("select id from test_im_memoria_temp limit 1");

        $arr = array(
            0 => array(
                'id' => '1'
            )
        );

        $this->assertEquals($arr, $result);

        $objIMConexaoFopenPHP->executar("truncate table test_im_memoria_temp");
    }


    public function testOfgetLastInsertId()
    {
        $objIMConexaoFopenPHP = $this->getConexaoParaTesteOK();

        $result = $objIMConexaoFopenPHP->executar("truncate table test_im_memoria_temp");
        $result = $objIMConexaoFopenPHP->executar(
            "insert into test_im_memoria_temp (
                     id, ds_descricao, ds_classe, ds_parametros, dt_cadastro ) value (
                     1, 'teste', 'teste', 'teste', now() )"
        );

        $this->assertEquals(null, $objIMConexaoFopenPHP->getLastInsertId());

        $objIMConexaoFopenPHP->executar("truncate table test_im_memoria_temp");
    }

    public function testmensagem()
    {
        $objIMConexaoFopenPHP = $this->getConexaoParaTesteOK();
        $objIMConexaoFopenPHP->setMensagemErro('teste');
        $this->assertEquals($objIMConexaoFopenPHP->getMensagemErro(), 'teste');
    }

    public function getAtributosOK()
    {
        $objIMConexaoAtributos = new IMConexaoAtributos();

        $objIMConexaoAtributos->setNomeBanco("adriano");
        $objIMConexaoAtributos->setLogin("moodle");
        $objIMConexaoAtributos->setSenha("moodle");
        $objIMConexaoAtributos->setBanco("adriano");
        $objIMConexaoAtributos->setHost("localhost");
        $objIMConexaoAtributos->setPorta("");

        return $objIMConexaoAtributos;
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

    public function getConexaoParaTesteOK()
    {
        $objIMConexaoFopenPHP = new IMConexaoFopenPHP();
        $objIMConexaoFopenPHP->conectar($this->getAtributosOK());

        return $objIMConexaoFopenPHP;
    }
}

?>