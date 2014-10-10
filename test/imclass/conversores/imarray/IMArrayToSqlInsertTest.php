<?php
namespace test\imclass\conversores;

use imclass\conversores\imarray\IMArrayToSqlInsert;


class IMArrayToSqlInsertTest extends \PHPUnit_Framework_TestCase
{

    public function testconvertToInsert()
    {
        $objIMArrayToSqlInsert = new IMArrayToSqlInsert();


        // teste 1
        $sql = $objIMArrayToSqlInsert->convertToInsert(
            'nome_tabela',
            $this->mockArraySimples()
        );

        $sql = 'insert into nome_tabela ( campo1, campo2 ) values ( valor A, valor B );';

        $this->assertEquals(
            $sql,
            $sql
        );


        // teste 2
        $sql = $objIMArrayToSqlInsert->convertToInsert(
            'nome_tabela',
            $this->mockArraySimples2()
        );

        $sql = 'insert into nome_tabela values ( valor A, valor B );';

        $this->assertEquals(
            $sql,
            $sql
        );

        // teste 3
        $sql = $objIMArrayToSqlInsert->convertToInsert(
            'nome_tabela',
            $this->mockArrayBidimensional()
        );

        $this->assertEquals(
            $sql,
            $sql
        );
    }


    public function mockArraySimples()
    {
        return array(
            'campo1' => 'valor A',
            'campo2' => 'valor B'
        );
    }

    public function mockArrayBidimensional()
    {
        return array(
            0 => array(
                'campo1' => 'valor A',
                'campo2' => 'valor B'
            ),
            1 => array(
                'campo1' => 'valor A',
                'campo2' => 'valor B'
            )
        );
    }

    public function mockArraySimples2()
    {
        return array(
            'valor A',
            'valor B'
        );
    }
}