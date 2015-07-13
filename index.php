<?php

require_once 'include/AltoRouter/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('portfolio/');

$viewPath = 'views/';

$router->map('GET', '/', $viewPath . 'home.php', 'home');
// $router->map('GET|POST', '/comment', $viewPath . 'comment.php', 'comment');
// $router->map('GET|POST', '/subscribe', $viewPath . 'subscribe.php', 'subscribe');

// $router->map('GET', '/email', $viewPath . 'emails/emailTemplate/email.html', 'email');
// $router->map('GET', '/confirmation', $viewPath . 'emails/confirmation/email.html', 'confirmation');
// $router->map('GET', '/tosnowbird', $viewPath . 'emails/tosnowbird/email.html', 'tosnowbird');

// $router->map('GET', '/faqs', $viewPath . 'faqs.php', 'faqs');
// $router->map('GET', '/testimonials', $viewPath . 'testimonials.php', 'testimonials');

$match = $router->match();


if($match) {
	require $match['target'];
} else {
	require $viewPath . '404.php';
}


?>