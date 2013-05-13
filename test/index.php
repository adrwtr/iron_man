<?
define('C_PATH_SIMPLE_TEST', '../externos/simpletest');
define('C_PATH', '../');
define('C_PATH_CLASS', C_PATH . 'class/' );

//carrega classes de teste
require_once( C_PATH_SIMPLE_TEST . '/unit_tester.php' );
require_once( C_PATH_SIMPLE_TEST . '/custom/default_classes.php' );
require_once( C_PATH_SIMPLE_TEST . '/custom/detailed_reporter.php' );

require_once( './class/IMBaseTestSuit.class.php' );


function vl($a)
{
   echo var_dump($a);
   echo "<HR>";
}

$obj = new IMBaseTestSuit();
$obj->run( new HtmlReporterFull() );
?>