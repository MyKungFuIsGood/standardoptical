<?php

$path = array_diff(explode("/",$_SERVER["REQUEST_URI"]), array(''));

$file			= strtolower(array_pop($path));
$year			= strtolower(array_pop($path));
$category	= strtolower(array_pop($path));

$path = getcwd() . '/media/' . $category . '/' . $year . '/' . $file . '.*';
preg_match('/\.[^\.]+$/i', glob($path)[0], $type);
$type = $type[0];

?>

<div class="row">
	<div class="col s12 m8 offset-m2">
		<div class="card hoverable">
			<?php if($type == '.jpg'): ?>
				<div class="card-image">
					<img src="/portfolio/assets/images/preloader-bg.gif" data-src="<?php echo '/portfolio/media/' . $category . '/' . $year . '/' .  $file . $type; ?>">
					<span class="card-title"><?php echo $file ?></span>
				</div>
			<?php endif; ?>

			<?php if($type == '.mp4'): ?>
				<div class="card-image">
					<video 
					src="<?php echo '/portfolio/media/' . $category . '/' . $year . '/' . $file . $type; ?>"
					poster="<?php echo '/portfolio/media/' . $category . '/' . $year . '/' . $file . '-thumb.jpg'; ?>" 
					with="100%" 
					height="100%"></video>
				</div>
			<?php endif; ?>
		</div><!-- .card -->
	</div><!-- .col -->
</div><!-- .row -->