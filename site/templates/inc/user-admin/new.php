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
	<button type="submit" class="btn btn-success">Create</button>
</form>
