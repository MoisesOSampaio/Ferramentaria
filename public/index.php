<?php

use SOURCE\routes\Router;
use Dotenv\Dotenv;

require '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__,1));
$dotenv->load();


$path = Router::execute();


require '../src/view/' . $path;

?>
