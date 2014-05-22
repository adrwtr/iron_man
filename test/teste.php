<?
define('C_PATH_RAIZ',            '../');
require_once C_PATH_RAIZ . 'apps/nucleo.php';
require_once C_PATH_DOCTRINE . '/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use info_data\base\ConexaoLocalIM;

use imclass\banco_dados\IMDoctrine;
use imclass\beans\internos\execucoes\IMTestImMemoriaTemp;

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


      $objIMTestImMemoriaTemp = new IMTestImMemoriaTemp();

      $objIMTestImMemoriaTemp->setDsDescricao('teste');
      $valor = $objIMDoctrine->persist($objIMTestImMemoriaTemp);
      $objIMDoctrine->flush();


      // $this->assertEquals( $valor, 'aaa');      

?>