<?php
/**
 * Este arquivo é o iniciador do doctrine.
 * com ele podemos usar atraves do msdos por linha de comando
 */
require_once "doctrine_bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);