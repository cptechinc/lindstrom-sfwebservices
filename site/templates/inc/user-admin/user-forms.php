<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>
<div class="card">
	<div class="card-header">
		User: <?= $user->name; ?>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6 border-right border-dark">
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
			<div class="col-sm-6">
				<h4 class="card-title">Edit Authorization</h4>
				<form action="<?= $page->url; ?>" id="edit-user-authorization-form" method="POST">
					<input type="hidden" name="action" value="edit-user-authorization">

					<div class="form-group">
						<label for="username">User Name</label>
						<input type="text" class="form-control-plaintext" id="username" name="username" value="<?= $user->name; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="customerNumber">customerNumber</label>
						<input type="customerNumber" class="form-control" id="customerNumber" name="customerNumber" value="<?= $user->customerNumber; ?>">
					</div>
					<div class="form-group">
						<label for="customerName">customerName</label>
						<input type="customerName" class="form-control" id="customerName" name="customerName" value="<?= $user->customerName; ?>">
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
					<hr>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="portal" id="portal-user" value="Y" <?= $user->has_portal() ? 'checked' : '' ; ?>>
							<label class="custom-control-label" for="portal-user">Portal User</label>
						</div>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="api" id="api-user" value="Y" <?= $user->has_api() ? 'checked' : '' ; ?>>
							<label class="custom-control-label" for="api-user">API User</label>
						</div>
					</div>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-floppy-o"aria-hidden="true"></i> Save
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="card-footer text-right">
		<form action="<?= $page->url; ?>" method="POST">
			<input type="hidden" name="action" value="delete-user">
			<input type="hidden" name="username" value="<?= $user->name; ?>">

			<button type="submit" class="btn btn-danger">
				<i class="fa fa-trash" aria-hidden="true"></i> Delete
			</button>
		</form>
	</div>
</div>
