<?php
$crumbs = array_diff(explode("/",$_SERVER["REQUEST_URI"]), array(''));

$path = '';
$breadcrumb = '';
$last = end($crumbs); 
$length = count($crumbs);

foreach($crumbs as $crumb){
	if($crumb != $last) {
		$path .= '/' . $crumb ;
		$breadcrumb .= '<a href="' . $path . '">';
		$breadcrumb .= ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
		$breadcrumb .= '</a>';
		$breadcrumb .= '&nbsp;/&nbsp;';
	}
}
$breadcrumb .= ucfirst($last);
?>

<header>
	<div class="container">
		<a href="/portfolio">
			<img class="responsive-img logo" src="/portfolio/assets/images/logo.png">
		</a>
		<div class="breadcrumbs">
			<?php if(strripos($breadcrumb, 'login') == false) : ?>
				<?php echo $breadcrumb; ?>
			<? endif; ?>
		</div>
	</div>
</header>

<body>
	<main>
		<div class="container">
			<div class="center-align">
				<div class="preloader-wrapper big active center-align">
					<div class="spinner-layer spinner-blue-only">
						<div class="circle-clipper left">
							<div class="circle"></div>
						</div>
						<div class="gap-patch">
							<div class="circle"></div>
						</div>
						<div class="circle-clipper right">
							<div class="circle"></div>
						</div>
					</div>
				</div><!-- .preloader-wrapper -->
			</div><!-- .center-align -->