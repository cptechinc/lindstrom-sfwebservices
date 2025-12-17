<?php
	$endpoint = $args['endpoint'];
	$page = $args['page'];
?>
<form action="<?= $page->url; ?>" method="GET">
	<table class="table">
		<tr>
			<th>Param</th>
			<th>Value</th>
		</tr>
		<tr>
			<td><label for="serviceMethod">Service Method</label></td>
			<td>
				<select name="serviceMethod" class="form-control" id="serviceMethod">
					<option value="GET">GET</option>
					<option value="POST">POST</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="IDCLogin">IDCLogin</label>
			</td>
			<td>
				<input type="text" class="form-control" name="IDCLogin" id="IDCLogin" aria-describedby="IDCLogin">
			</td>
		</tr>
		<tr>
			<td>
				<label for="IDCPassword">IDCPassword</label>
			</td>
			<td>
				<input type="text" class="form-control" name="IDCPassword" id="IDCPassword" aria-describedby="IDCPassword">
			</td>
		</tr>
		<?php foreach ($endpoint->get_fields() as $fieldname) : ?>
			<tr>
				<td>
					<label for="<?= $fieldname; ?>"><?= $fieldname; ?></label>
				</td>
				<td>
					<input type="text" class="form-control" name="<?= $fieldname; ?>" id="<?= $fieldname; ?>" aria-describedby="<?= $fieldname; ?>">
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
