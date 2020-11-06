<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>
<form action="<?= $page->url; ?>" id="new-user-form" method="POST">
	<input type="hidden" name="action" value="add-user">

	<div class="form-group">
		<label for="username">User Name</label>
		<input type="text" class="form-control" id="username" name="username" value="">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" name="password" value="">
	</div>
	<div class="form-group">
		<label for="customerNumber">customerNumber</label>
		<input type="customerNumber" class="form-control" id="customerNumber" name="customerNumber">
	</div>
	<div class="form-group">
		<label for="customerName">customerNumber</label>
		<input type="customerName" class="form-control" id="customerName" name="customerName">
	</div>
	<div class="form-group">
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" name="portal" id="portal-user" value="Y">
			<label class="custom-control-label" for="portal-user">Portal User</label>
		</div>
	</div>
	<div class="form-group">
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" name="api" id="api-user" value="Y">
			<label class="custom-control-label" for="api-user">API User</label>
		</div>
	</div>
	<button type="submit" class="btn btn-success">Create</button>
</form>
