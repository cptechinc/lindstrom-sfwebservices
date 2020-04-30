<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>
<div class="form-group">
	<a href="<?= $page->add_user(); ?>" class="btn btn-secondary">
		<i class="fa fa-plus" aria-hidden="true"></i> Add
	</a>
</div>
<div class="list-group">
	<?php foreach ($users as $user) : ?>
		<div class="list-group-item">
			<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1"><?= $user->name; ?></h5>
				<a href="<?= $page->view_user($user->name); ?>" class="btn btn-warning">
					<i class="fa fa-pencil" aria-hidden="true"></i> Edit
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
