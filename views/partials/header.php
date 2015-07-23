<?php

if(!empty($_SESSION['auth'])) {
	$crumbs = array_diff(explode("/",$_SERVER["REQUEST_URI"]), array(
		'', 
		'category', 
		'2015', 
		'2014', 
		'2013',
		'2012',
		'2011',
		'2010',
		'2009',
		'2008'
		));

	$path = '';
	$breadcrumb = '';
	$last = end($crumbs); 
	$length = count($crumbs);

	foreach($crumbs as $crumb){
		if($crumb != $last) {
			$path .= '/' . $crumb ;
			$breadcrumb .= '<a href="' . $path . '">';
			$breadcrumb .= ucwords(str_replace(array(".php","_", "-"),array(""," ", " "),$crumb) . ' ');
			$breadcrumb .= '</a>';
			$breadcrumb .= '&nbsp;/&nbsp;';
		}
	}
	$breadcrumb .= ucwords(str_replace("-", " ", $last));
}

?>

<header>
	<div class="container">
		<div class="row">
			<a href="/portfolio">
				<img class="responsive-img logo" src="/portfolio/assets/images/logo.png">
			</a>
			<div class="breadcrumbs">
				<?php if(isset($breadcrumb)) echo $breadcrumb; ?>
			</div><!-- .breadcrumbs -->

			<?php if(!empty($_SESSION['auth'])) : ?>
				<form class="logout" action="/portfolio/logout" method="post">
					<div class="row">
						<div class="input-field hide">
							<input id="logout" type="text" class="validate">
						</div>
						<button class="btn logout waves-effect waves-light" type="submit" name="action">Logout</button>
					</div><!-- .row -->
				</form><!-- form.login -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</header>

<body>
	<main>
		<div class="container">

