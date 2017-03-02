<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', ['name' => 'World']));
$routes->add('bye', new Route('/bye'));
$routes->add('php-info', new Route('/phpinfo'));

// Modern PHP examples
$routes->add('document-store', new Route('/document-store'));

return $routes;
