<?php
namespace test\imclass\banco_dados;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use info_data\base\ConexaoLocalIM;

use imclass\banco_dados\IMDoctrine;
use imclass\beans\internos\execucoes\IMTestImMemoriaTemp;

class IMDoctrineTest extends \PHPUnit_Framework_TestCase
{   

   public function testGetSetEntityManager()
   {
      $objIMDoctrine = $this->getObjTest();

      $this->assertEquals( 
         get_class( $objIMDoctrine->getEntityManager()  ),
         'Doctrine\ORM\EntityManager'
      );
   }

   public function testPersist()
   {      
      $objIMDoctrine          = $this->getObjTest();      
      $objIMTestImMemoriaTemp = new IMTestImMemoriaTemp();

      $objIMTestImMemoriaTemp->setDsDescricao('teste');
      $valor = $objIMDoctrine->persist($objIMTestImMemoriaTemp);

      $this->assertEquals( $valor, null );    
      $objIMDoctrine->flush();  

      $objIMDoctrine->remove($objIMTestImMemoriaTemp);
      $objIMDoctrine->flush();
   }


   public function getObjTest()
   {
      $doctrine_isDevMode = true;
      $doctrine_config    = Setup::createYAMLMetadataConfiguration(
         array( C_PATH_DOCTRINE_CONFIG ), 
         $doctrine_isDevMode
      );

      // conexao local
      $objConexaoLocalIM     = new ConexaoLocalIM();
      $objIMConexaoAtributos = $objConexaoLocalIM->getIMConexaoAtributos();

      // database configuration parameters
      $doctrine_atributos = array(
          'driver'   => 'pdo_mysql',
          'user'     => $objIMConexaoAtributos->getLogin(),
          'password' => $objIMConexaoAtributos->getSenha(),
          'dbname'   => $objIMConexaoAtributos->getBanco()
      );

      // obtaining the entity manager
      $objEntityManager = EntityManager::create( 
         $doctrine_atributos, 
         $doctrine_config 
      );

      $objIMDoctrine = new IMDoctrine();
      $objIMDoctrine->setEntityManager( $objEntityManager );


      return $objIMDoctrine;
   }
}