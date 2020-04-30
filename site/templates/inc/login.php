<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>
<div class="container-fluid page" id="login-container">
	<div class="col-sm-6 mx-auto">
		<h2>Login to WebServices</h2>
	</div>
	<div class="col-sm-6 mx-auto">
		<?php if (!$user->loggedin) : ?>
			<?php if ($errormsg) : ?>
				<?= render_php("{$config->paths->templates}inc/util/alert.php", $args = array('type' => 'danger', 'title' => 'Error!', 'iconclass' => 'fa fa-warning fa-2x', 'message' => $errormsg)); ?>
			<?php endif; ?>
			<br>
		<?php endif; ?>
	</div>
	<div class="col-sm-6 mx-auto">
		<form action="<?= $page->url; ?>" class="form-signin text-center" method="POST" >
			<input type="hidden" name="action" value="login">

			<div class="form-group">
				<label for="inputUsername" class="sr-only">Username</label>
				<input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required="">
			</div>

			<div class="form-group">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
			</div>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<p class="mt-4 mb-3 text-muted">CP Tech &copy; <?= date('Y'); ?></p>
		</form>
	</div>
</div>
