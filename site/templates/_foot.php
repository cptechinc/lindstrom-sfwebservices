	<footer class="bg-dark pb-3">
		<div class='container'>
			<div class="row">
				<div class="col-sm-4 text-white"> <br>
					&copy; <?= date('Y'); ?> CPTech
				</div>
				<div class="col-sm-4">
					<strong class="text-white">User: <?= $user->name; ?></strong> <br>
					<strong class="text-white">Session ID: <?= session_id(); ?></strong>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</footer>
	<a id="back-to-top" href="#" class="btn btn-success back-to-top" role="button">
		<i class="fa fa-chevron-up" aria-hidden="true"></i>
		<span class="sr-only">Go Back to the Top</span>
	</a>
	<?php include ('./_foot-blank.php'); ?>
	</body>
</html>
