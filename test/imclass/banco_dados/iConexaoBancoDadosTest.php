<?php
namespace test\imclass\banco_dados;

use imclass\banco_dados\iConexaoBancoDados;
use imclass\banco_dados\IMConexaoAtributos;

class iConexaoBancoDadosTest extends \PHPUnit_Framework_TestCase
{
    var $objiConexaoBancoDados;

    // cria a classe mockada
    public function setUp()
    {
        $this->objiConexaoBancoDados = $this->getMock( 'imclass\banco_dados\iConexaoBancoDados' );

        $this->objiConexaoBancoDados
           ->expects( $this->any() )
           ->method( 'conectar' )
           ->will( $this->returnValue( true ) );

        $this->objiConexaoBancoDados
           ->expects( $this->any() )
           ->method( 'query' )
           ->will( $this->returnValue( array() ) );

        $this->objiConexaoBancoDados
           ->expects( $this->any() )
           ->method( 'executar' )
           ->will( $this->returnValue( 0 ) );

        $this->objiConexaoBancoDados
           ->expects( $this->any() )
           ->method( 'getLastInsertId' )
           ->will( $this->returnValue( 0 ) );
    }

    public function testInterface()
    {
        $this->assertEquals( $this->objiConexaoBancoDados->conectar( new IMConexaoAtributos() ), true );
        $this->assertEquals( $this->objiConexaoBancoDados->query( '' ), array() );
        $this->assertEquals( $this->objiConexaoBancoDados->executar( '' ), 0 );
        $this->assertEquals( $this->objiConexaoBancoDados->getLastInsertId(), 0 );

        $this->assertEquals( $this->objiConexaoBancoDados->getIsConnected(), null );
        $this->assertEquals( $this->objiConexaoBancoDados->setIsConnected( '' ), null );
        $this->assertEquals( $this->objiConexaoBancoDados->getMensagemErro( '' ), null );
        $this->assertEquals( $this->objiConexaoBancoDados->setMensagemErro( '' ), null );
    }
}

?>