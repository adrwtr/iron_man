<?php
/**
 * Este arquivo é o iniciador do doctrine.
 * com ele podemos usar atraves do msdos por linha de comando
 */
$doctrine_source = 'externos/doctrine/vendor/';
require_once $doctrine_source . '/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use imclass\beans\internos\execucoes\IMExecucoes;

$doctrine_config_path = "info_data/yaml";

$isDevMode  = true;

$config     = Setup::createYAMLMetadataConfiguration(
   array( $doctrine_config_path ), 
   $isDevMode
);

// database configuration parameters
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'moodle',
    'password' => 'moodle',
    'dbname'   => 'adriano',
);

// obtaining the entity manager
$entityManager = EntityManager::create( $dbParams, $config );