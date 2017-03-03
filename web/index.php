<?php 

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/routes.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

try {
	if ('/' === $request->getPathInfo()) {
		$_SERVER['REQUEST_URI'] = '/index';
	}
	extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
	ob_start();
	include sprintf(__DIR__.'/../src/pages/%s.php', $_route);
	$response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $e) {
	$response = new Response('Not Found', 404);
} catch (Exception $e) {
	$response = new Response('An error occurred', 500);
}

$response->send();
