<?php

session_start();

require_once 'include/AltoRouter/AltoRouter.php';

$nonAuthRoutes = ['login', 'login-error', 'auth', 'logout'];

// Router setup
//---
$router = new AltoRouter();
$router->setBasePath('portfolio/');
$viewPath = 'views/';

// Router matches
//---
// Manual
$router->map('GET|POST', '/', $viewPath . 'home.php', 'home');
$router->map('GET|POST', '/tv', $viewPath . 'tv.php', 'tv');
$router->map('GET|POST', '/outdoor', $viewPath . 'outdoor.php', 'outdoor');
$router->map('GET|POST', '/collateral', $viewPath . 'collateral.php', 'collateral');
// Auth
$router->map('GET|POST', '/login', $viewPath . 'auth/login.php', 'login');
$router->map('GET|POST', '/login/[*:error]', $viewPath . 'auth/login.php', 'login-error');
$router->map('GET|POST', '/logout', $viewPath . 'auth/logout.php', 'logout');
$router->map('POST', '/auth', $viewPath . 'auth/auth.php', 'auth');
// Dynamic

$result = $viewPath . '404.php';

$match = $router->match();
if($match) {
	if(empty($_SESSION['auth']) && !in_array($match['name'], $nonAuthRoutes)) {
		header('Location: login');
		exit;
	}

	$result = $match['target'];

} else {
	header('HTTP/1.0 404 Not Found');
}

include $viewPath . 'partials/head.php';
include $result;
include $viewPath . 'partials/footer.php';

?>