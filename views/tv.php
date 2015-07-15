<?php
	$path = '/media/tv/';
	$thumbs = getcwd() . $path . 'thumbs';
	$files = array_diff(scandir($thumbs, 0), array('..', '.', 'thumbs'));
?>

<div class="row tv">
	<?php foreach($files as $file) : ?>
		<div class="col s12 m6 l2">
			<a href="<?php echo '/portfolio/tv/' . preg_replace('/\\.[^.\\s]{3,4}$/', '', $file); ?>">
				<div class="card hoverable">
					<div class="card-image">
						<img src="<?php echo '/portfolio' . $path . 'thumbs/' . $file; ?>">
						<span class="card-title"><?php echo preg_replace('/\\.[^.\\s]{3,4}$/', '', $file); ?></span>
					</div><!-- .card-image -->
				</div><!-- .card -->
			</a>
		</div><!-- .col .s12 .m6 .l4 -->
	<?php endforeach; ?>
</div>