<?php

$types = array(
	'tv' => '.jpg',
	'outdoor' => '.jpg',
	'collateral' => '.jpg'
	);

$path = array_diff(explode("/",$_SERVER["REQUEST_URI"]), array(''));
$file = strtolower(array_pop($path));
$dir = strtolower(array_pop($path));
$type = $types[$dir];

?>

<div class="col s12">
	<div class="card hoverable">
		<?php if($type == '.jpg'): ?>
			<div class="card-image">
				<img src="<?php echo '/portfolio/media/' . $dir . '/' .  $file . $type; ?>">
				<span class="card-title"><?php echo $file ?></span>
			</div>
		<?php endif; ?>
	</div>
</div>
