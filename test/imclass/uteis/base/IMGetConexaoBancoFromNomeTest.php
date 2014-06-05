<?php
namespace test\imclass\uteis\base;

use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\banco_dados\IMConexaoBancoDados;

class IMGetConexaoBancoFromNomeTest extends \PHPUnit_Framework_TestCase
{ 
   public function testGetConexao()
   {
      $classe_nao_existe = '1teste.php';
      $classe_existe     = 'ConexaoLocal.php';
      // $classe_real       = 'imclass\banco_dados\IMConexaoBancoDadosPDO';
      $classe_real       = 'test\imclass\uteis\base\IMGetConexaoBancoFromNomeTest';

      $this->assertEquals( 
         $classe_real, 
         get_class( IMGetConexaoBancoFromNome::GetConexao( $classe_existe ) )
      );

      $this->assertEquals( 
         null, 
         IMGetConexaoBancoFromNome::GetConexao( $classe_nao_existe ) 
      );
   }


   public function testArrumaClasse()
   {      
      $valor_ruim = '../classe/teste.php';
      $valor_test = 'classe\\teste';

      $this->assertEquals( 
         $valor_test, 
         IMGetConexaoBancoFromNome::arrumaClasse( $valor_ruim )
      );      
   }   
}
?>