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
$router->map('GET', '/', $viewPath . 'home.php', 'home');
// Auth
$router->map('GET', '/login', $viewPath . 'auth/login.php', 'login');
$router->map('GET', '/login/[*:error]', $viewPath . 'auth/login.php', 'login-error');
$router->map('GET', '/logout', $viewPath . 'auth/logout.php', 'logout');
$router->map('GET', '/auth', $viewPath . 'auth/auth.php', 'auth');

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