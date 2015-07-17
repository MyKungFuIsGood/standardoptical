<?php
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

