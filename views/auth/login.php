<?php
$error = (isset($match['params']['error']));
?>

<div class="container">
	<div class="row">
		<form class="login col s6 offset-s3" action="auth" method="post">
			<div class="row">
				<div class="input-field col s12">
					<input id="auth" type="text" class="validate" name="auth" require="required">
					<label for="auth">Login</label>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
				</div>
			</div><!-- .row -->
		</form><!-- form.login -->
	</div><!-- .row -->
</div><!-- .container -->