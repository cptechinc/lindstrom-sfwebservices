<?php
	$homepage = $pages->get('/');
	$apimenu  = $pages->get('template=api, name=api');
	$apitest  = $pages->get('template=api, name=tests');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href="<?= $homepage->url; ?>"><?= $homepage->headline; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-navigation" aria-controls="navbar-navigation" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbar-navigation">
		<?php if ($page->hidenav == false) : ?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#"><?= $homepage->title; ?></a>
				</li>
				<?php if ($user->hasRole('user-admin')) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= $pages->get('template=user-admin')->url; ?>">
							<?= $pages->get('template=user-admin')->title; ?>
						</a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= $pages->get('template=login')->url; ?>">
							<?= $pages->get('template=login')->title; ?>
						</a>
					</li>
				<?php endif; ?>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="api-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $apimenu->title; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="api-dropdown">
						<?php foreach ($apimenu->children as $api) : ?>
							<a class="dropdown-item" href="<?= $api->url; ?>">
								<?= $api->title; ?>
							</a>
						<?php endforeach; ?>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="apitest-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $apitest->title; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="apitest-dropdown">
						<?php foreach ($apitest->children as $api) : ?>
							<a class="dropdown-item" href="<?= $api->url; ?>">
								<?= $api->title; ?>
							</a>
						<?php endforeach; ?>
					</div>
				</li>
			</ul>
		<?php endif; ?>
		<form class="form-inline my-2 my-lg-0">
			<?php if ($user->isLoggedin()) : ?>
				<a href="<?= $pages->logoutURL(); ?>" class="btn btn-danger">Logout</a>
			<?php endif; ?>
		</form>
	</div>
</nav>
