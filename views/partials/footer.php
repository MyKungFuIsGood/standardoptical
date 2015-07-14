		</div><!-- .container -->
	</main>

	<footer class="container center-align">
		<div class="row">
			<form class="logout col s6 offset-s3" action="/portfolio/logout" method="post">
				<div class="row">
					<div class="input-field hide">
						<input id="logout" type="text" class="validate">
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Logout</button>
				</div><!-- .row -->
			</form><!-- form.login -->
		</div><!-- .row -->
	</footer>

</body>

<?php include 'footer-scripts.php'; ?>

</html>