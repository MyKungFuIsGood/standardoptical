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
$router->map('GET|POST', '/', $viewPath . 'category-list.php', 'home');
// Auth
$router->map('GET|POST', '/login', $viewPath . 'auth/login.php', 'login');
$router->map('GET|POST', '/login/[*:error]', $viewPath . 'auth/login.php', 'login-error');
$router->map('GET|POST', '/logout', $viewPath . 'auth/logout.php', 'logout');
$router->map('POST', '/auth', $viewPath . 'auth/auth.php', 'auth');
// Dynamic
$router->map('GET', '/[:category]', $viewPath . 'item-list.php', 'category');
$router->map('GET', '/[:category]/[:year]/[:file]', $viewPath . 'item.php', 'item');

$router->map('GET', '/[:category]/', $viewPath . 'item-list.php', 'category/');
$router->map('GET', '/[:category]/[:year]/[:file]/', $viewPath . 'item.php', 'item/');

// Matching
//---
$result = $viewPath . '404.php';

$match = $router->match();
if($match) {
	if(empty($_SESSION['auth']) && !in_array($match['name'], $nonAuthRoutes)) {
		header('Location: login');
		exit;
	}

	$result = $match['target'];

} else {
	// header('HTTP/1.0 404 Not Found');
}

// Return route match 
//---
include $viewPath . 'partials/head.php';
include $result;
include $viewPath . 'partials/footer.php';

?>