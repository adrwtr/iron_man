<?php
namespace test\imclass\apps;

use imclass\apps\AppExecucoes;

use imclass\entidades\internos\execucoes\IMExecucoes;
use imclass\repositorios\internos\execucoes\IMExecucoesRespositorio;

// conexao com o banco de testes
use test\imclass\banco_dados\IMDoctrineTest;

class AppExecucoesTest extends \PHPUnit_Framework_TestCase
{
   var $objAppExecucoes;
   var $classe_teste;

   public function __construct()
   {
      $this->objAppExecucoes = new AppExecucoes();
      $this->classe_teste    = 'UnitTestApagar';
   }

   public function registerDoctrineTest()
   {
      $objIMDoctrineTest = new IMDoctrineTest();
      $objIMDoctrine     = $objIMDoctrineTest->getObjTest();      

      $this->objAppExecucoes
         ->registerDoctrine( $objIMDoctrine );
   }

   public function testgetExecucoes()
   {  
      // inicia conexao
      $this->registerDoctrineTest();

      // cria objeto
      $objIMExecucoes = $this->criaTest();

      // salva objeto
      $objIMDoctrine = $this->objAppExecucoes
         ->getIMDoctrine();

      $objIMDoctrine->persist( $objIMExecucoes );
      $objIMDoctrine->flush();

      // teste
      $ds_nome_classe = $this->classe_teste;
      $ds_path_classe = $this->classe_teste;

      $arrObjs = $this->objAppExecucoes->getExecucoes( 
         $ds_nome_classe, 
         $ds_path_classe 
      );

      $this->assertEquals( 
         $arrObjs,
         array()
      );   

      vl( $objIMExecucoes->getCdExecucao() );

      /////////////// nao está apgando

      $objIMDoctrine->remove( $objIMExecucoes );
      $objIMDoctrine->flush();
   }


   public function criaTest()
   {
      $objIMExecucoes = new IMExecucoes();
      
      $objIMExecucoes->setDsNomeClasse( 
         $this->classe_teste 
      );
      
      $objIMExecucoes->setDsPathClasse( 
         $this->classe_teste 
      );

      $objIMExecucoes->setDtExecucao( 
         new \DateTime("now") 
      );

      return $objIMExecucoes;
   }

}
?>