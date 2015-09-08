<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once dirname(__FILE__) . '/Application/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('/eds');
$router->addMatchTypes(array('j' => '[0-9A-Za-z_\' ]++'));

$router->map( 'GET', '/search/', 'Public/find.php', 'home');
$router->map( 'GET', '/display/[*:item]', 'Public/find.php', 'search');

//If we use JSONP we need to include a callback
$router->map( 'GET', '/search/[*:item]?callback=[*:callback]', 'Public/find.php', 'search-callback');

$match = $router->match();
if($match) {
	require $match['target'];
} else {
	header("HTTP/1.0 404 Not Found");
	require '404.html';
} 
