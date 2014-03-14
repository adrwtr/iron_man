<?php
namespace test\imclass\imphp\file;

use imclass\imphp\file\DiretorioManipulation;

use org\bovigo\vfs\vfsStream;

class DiretorioManipulationTest extends \PHPUnit_Framework_TestCase
{   
   public function testgetAllArquivos()
   {
      // criando o mock
      $dir_test     = 'exemplo_dir';  
      $nome_arquivo = 'arquivo.txt';    

      $dir_mock = vfsStream::setup($dir_test);

      vfsStream::newFile( $nome_arquivo )
         ->at( $dir_mock )
         ->setContent("The new contents of the file");


      // teste da classe
      $objDiretorioManipulation = new DiretorioManipulation();
      $arrArquivos = $objDiretorioManipulation->getAllArquivos( vfsStream::url($dir_test) );

      $arrArquivosTest = array(
         0 => $nome_arquivo
      );

      $this->assertEquals( $arrArquivos, $arrArquivosTest);
   }

}
?>