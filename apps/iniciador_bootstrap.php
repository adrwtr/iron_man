<?
/**
 * Este arquivo � respons�vel por iniciar o php da maneira certa
 * referente aos namespaces do projeto
 */
require_once C_PATH_DOCTRINE . '/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use info_data\base\ConexaoLocalIM;
use imclass\banco_dados\IMDoctrine;

$doctrine_isDevMode = true;
$doctrine_config = Setup::createYAMLMetadataConfiguration(
    array( C_PATH_DOCTRINE_CONFIG ),
    $doctrine_isDevMode
);

// conexao local
$objConexaoLocalIM = new ConexaoLocalIM();
$objIMConexaoAtributos = $objConexaoLocalIM->getIMConexaoAtributos();

// database configuration parameters
$doctrine_atributos = array(
    'driver' => 'pdo_mysql',
    'user' => $objIMConexaoAtributos->getLogin(),
    'password' => $objIMConexaoAtributos->getSenha(),
    'dbname' => $objIMConexaoAtributos->getBanco()
);

// obtaining the entity manager
$objEntityManager = EntityManager::create(
    $doctrine_atributos,
    $doctrine_config
);

//var_dump($objEntityManager->getRepository('imclass\entidades\internos\execucoes\IMExecucoes')->findBy(array('ds_nome_classe' => 'clearEstagio')));
//die('paro');
$objIMDoctrine = new IMDoctrine();
$objIMDoctrine->setEntityManager( $objEntityManager );

/**
 * Esta fun��o ir� executar o load das classes do namespace
 * ela � executada no escopo global
 */
/*function __autoload($c)
{   
   require_once C_PATH_RAIZ . $c . '.php';
}*/
?>