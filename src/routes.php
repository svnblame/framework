<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('index', new Route('/'));
$routes->add('hello', new Route('/hello/{name}', ['name' => 'World']));
$routes->add('bye', new Route('/bye/{name}', ['name' => 'World']));
$routes->add('phpinfo', new Route('/phpinfo'));

// Modern PHP examples
$routes->add('document-store', new Route('/document-store'));

return $routes;
