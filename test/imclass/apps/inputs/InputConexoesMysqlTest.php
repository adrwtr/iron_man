<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\InputConexoesMysql;

use org\bovigo\vfs\vfsStream;

class InputConexoesMysqlTest extends \PHPUnit_Framework_TestCase
{
    var $objInputConexoesMysql;
    var $arrArquivosTest;

    // cria a classe mockada
    public function setUp()
    {
        $this->objInputConexoesMysql = new InputConexoesMysql();

        // criando o mock
        $dir_test     = 'exemplo_dir';
        $nome_arquivo = 'arquivo.txt';

        $dir_mock = vfsStream::setup($dir_test);

        vfsStream::newFile($nome_arquivo)
            ->at($dir_mock)
            ->setContent("The new contents of the file");

        $this->objInputConexoesMysql
            ->setDirConexoes(vfsStream::url($dir_test));

        $this->arrArquivosTest = array(
            0 => $nome_arquivo
        );
    }

    /*public function testgetAllConexoes()
    {
        $this->assertEquals(
            $this->objInputConexoesMysql
                ->getAllConexoes(),
            $this->arrArquivosTest
        );
    }*/

    public function dadosParaTeste()
    {
        return array( array( 'COISA' ) );
    }



    /**
     * @depends      testgetNome
     * @depends      testgetLabel
     * @dataProvider dadosParaTeste
     */
    public function testgetComponente($nome)
    {
        $this->objInputConexoesMysql->setLabel($nome);
        $this->objInputConexoesMysql->setNome($nome);
        $this->objInputConexoesMysql->setValor($nome);

        $campo = '
        <div class="row">
        <div class="col-lg-6">
        <div class="input-group">
        <div class="input-group-btn">
        <button type="button" 
        class="btn btn-default dropdown-toggle" 
        data-toggle="dropdown">
        Conexoes
        <span class="caret">
        </span></button>
        <ul class="dropdown-menu">
        ';

        foreach ($this->arrArquivosTest as $key => $value) {
            $campo .= '<li><a href="#" 
            onclick="$(\'#' . $nome . '\').val(\'' . $value . '\');">
            ' . $value . '</a></li>';
        }

        $campo .= '
        </ul>
        </div>
        <!-- /btn-group -->
        <input type="text" class="form-control" 
        id="' . $nome . '"
        name="' . $nome . '"
        value="' . $nome . '">
        </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        ';

        $this->assertEquals(
            $this->objInputConexoesMysql
                ->getComponente(),
            $campo
        );
    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objInputConexoesMysql->getTipo(),
            'InputConexoesMysql'
        );
    }
}