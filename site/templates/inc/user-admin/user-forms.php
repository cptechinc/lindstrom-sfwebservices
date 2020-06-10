<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>
<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Password</h4>
				<form action="<?= $page->url; ?>" class="mb-3" id="edit-user-password-form" method="POST">
					<input type="hidden" name="action" value="edit-user-password">

					<div class="form-group">
						<label for="username">User Name</label>
						<input type="text" class="form-control-plaintext" id="username" name="username" value="<?= $user->name; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" value="">
					</div>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-floppy-o"aria-hidden="true"></i> Save
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Authorization</h4>
				<form action="<?= $page->url; ?>" id="edit-user-authorization-form" method="POST">
					<input type="hidden" name="action" value="edit-user-authorization">

					<div class="form-group">
						<label for="username">User Name</label>
						<input type="text" class="form-control-plaintext" id="username" name="username" value="<?= $user->name; ?>" readonly>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="authorized" id="authorized" value="Y" <?= $user->is_authorized() ? 'checked' : '' ; ?>>
							<label class="custom-control-label" for="authorized">Authorize?</label>
						</div>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="production" id="production" value="Y" <?= $user->use_production() ? 'checked' : '' ; ?>>
							<label class="custom-control-label" for="production">Send Requests to Production?</label>
						</div>
					</div>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-floppy-o"aria-hidden="true"></i> Save
					</button>
				</form>
			</div>
		</div>

	</div>
</div>
