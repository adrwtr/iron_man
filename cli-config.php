<?php
// cli-config.php
require_once "doctrine_bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);