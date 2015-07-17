<?php
$path = getcwd() . '/media/';
$categories = array_diff(scandir($path, 0), array('.', '..'));
?>

<div class="row cards category">
	<h4>Categories</h4>
	<div class="category-wrapper">
	<?php foreach($categories as $category) : ?>
		<?php if(is_dir($path . $category)) : ?>
			<div class="col s12 m6 l4">
				<a href="<?php echo '/portfolio/' . $category; ?>">
					<div class="card hoverable">
						<div class="card-image">
							<img src="/portfolio/assets/images/preloader-bg.gif" data-src="<?php echo '/portfolio/media/' . $category . '/thumb.jpg'; ?>">
							<span class="card-title"><?php echo ucfirst($category); ?></span>
						</div><!-- .card-image -->
					</div><!-- .card -->
				</a>
			</div><!-- .col .s12 m6 l4 -->
		<?php endif; ?>
	<?php endforeach; ?>
	</div><!-- .category-wrapper -->
</div><!-- .row -->


