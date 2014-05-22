<?php
/**
 * Este é um arquivo de configurações do projeto
 */
define('C_PATH_VIEW',            C_PATH_RAIZ . 'views/' );
define('C_PATH_INFO',            C_PATH_RAIZ . 'info_data/' );
define('C_PATH_BOOT',            C_PATH_RAIZ . 'externos/bootstrap-3.1.1-dist/' );
define('C_PATH_ANGULAR',         C_PATH_RAIZ . 'externos/angularjs/angular.min.js' );
define('C_PATH_DOCTRINE',        C_PATH_RAIZ . 'externos/doctrine/vendor/' );
define('C_PATH_DOCTRINE_CONFIG', C_PATH_RAIZ . 'info_data/yaml' );


/**
 * Mostra o valor da variavel
 * @param $a variavel
 */
function vl($a)
{
    echo var_dump($a);
    echo "<HR>";
}
?>