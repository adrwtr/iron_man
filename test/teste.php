<?
define('C_PATH_RAIZ',            '../');
require_once C_PATH_RAIZ . 'apps/nucleo.php';
require_once C_PATH_DOCTRINE . '/autoload.php';


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use info_data\base\ConexaoLocalIM;

use imclass\banco_dados\IMDoctrine;
use imclass\entidades\internos\execucoes\IMTestImMemoriaTemp;

use imclass\entidades\internos\execucoes\IMExecucoes;
use imclass\repositorios\internos\execucoes\IMExecucoesRespositorio;


echo phpinfo();
die();

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


      // cria objeto
      $objIMExecucoes = criaTest();

      $objIMDoctrine->persist( $objIMExecucoes );
      $objIMDoctrine->flush();

      // teste
      $classe_teste = 'aaaa';
      $ds_nome_classe = $classe_teste;
      $ds_path_classe = $classe_teste;



      $objIMDoctrine->remove( $objIMExecucoes );
      $objIMDoctrine->flush();


    function criaTest()
   {
      $objIMExecucoes = new IMExecucoes();
      
      $objIMExecucoes->setDsNomeClasse( 
         'aaaa' 
      );
      
      $objIMExecucoes->setDsPathClasse( 
         'aaaa' 
      );

      $objIMExecucoes->setDtExecucao( 
         new \DateTime("now") 
      );

      return $objIMExecucoes;
   }


?>