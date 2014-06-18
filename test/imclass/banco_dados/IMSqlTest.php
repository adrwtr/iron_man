<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\IMSql;

class IMSqlTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function __construct()
    {
        $this->obj = new IMSql();
    }

    public function testConstruct()
    {
        $this->obj->__construct();
        $this->assertEquals($this->obj->get(), '');
        $this->assertEquals($this->obj->getTabela(), '');
    }

    public function testOfgetset()
    {
        $obj = $this->obj;

        $this->obj->set('teste');
        $texto = $this->obj->get();

        $this->assertEquals($texto, 'teste');
    }

    public function testOfgetsetTabela()
    {
        $obj = $this->obj;

        $this->obj->setTabela('teste');
        $texto = $this->obj->getTabela();

        $this->assertEquals($texto, 'teste');
    }

    public function testOfclear()
    {
        $this->obj->clear();
        $this->assertEquals($this->obj->get(), '');
    }

    public function testOfCampos()
    {
        $arrCampos = array(
            'campo1',
            'campo2'
        );

        $this->obj->setCampos($arrCampos);
        $this->assertEquals($arrCampos, $this->obj->getCampos());

        $this->obj->addCampo('campo3');
        $arrCampos[ ] = 'campo3';

        $this->assertEquals($arrCampos, $this->obj->getCampos());

        $this->obj->clearCampos();

        $this->assertEquals(array(), $this->obj->getCampos());


        $this->obj->setCampos('campo3');
        $arrCampos = array( 'campo3' );

        $this->assertEquals($arrCampos, $this->obj->getCampos());
    }

    public function testOfmontaSelect()
    {
        $arrCampos = array(
            'id',
            'nm_pessoa'
        );

        $this->obj->setCampos($arrCampos);
        $this->obj->montaSelect('pessoas');

        $this->assertEquals($this->obj->get(), 'SELECT id, nm_pessoa from pessoas');

        $this->obj->clear();
        $this->obj->setCampos(array());
        $this->obj->montaSelect('pessoas');

        $this->assertEquals($this->obj->get(), 'SELECT  *  from pessoas');
    }
}

?>