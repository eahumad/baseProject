<?php
use Slim\Views\PhpRenderer;
require 'vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./views");

$app->get('/', function($request, $response, $args) use($app) {
  $view = new \Slim\Views\PhpRenderer('views');
  return $this->renderer->render($response, "/principal.php", $args);
}); 
 
$app->run();