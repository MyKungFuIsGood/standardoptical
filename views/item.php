<?php

$path = array_diff(explode("/",$_SERVER["REQUEST_URI"]), array(''));

$file			= strtolower(array_pop($path));
$year			= strtolower(array_pop($path));
$category	= strtolower(array_pop($path));

$path = getcwd() . '/media/' . $category . '/' . $year . '/' . $file . '.*';
preg_match('/\.[^\.]+$/i', glob($path)[0], $type);
$type = $type[0];

?>

<div class="col s12">
	<div class="card hoverable">
		<?php if($type == '.jpg'): ?>
			<div class="card-image">
				<img src="/portfolio/assets/images/preloader-bg.gif" data-src="<?php echo '/portfolio/media/' . $category . '/' . $year . '/' .  $file . $type; ?>">
				<span class="card-title"><?php echo $file ?></span>
			</div>
		<?php endif; ?>
	</div>
</div>
