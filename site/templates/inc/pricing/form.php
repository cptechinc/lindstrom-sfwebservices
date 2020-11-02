<?php
	$endpoint = $args['endpoint'];
	$page = $args['page'];
	$data = $args['data'];
?>
<form action="<?= $page->url; ?>" method="POST">
	<table class="table">
		<tr>
			<th>Param</th>
			<th>Value</th>
		</tr>
		<tr>
			<td>
				<label for="IDCLogin">IDCLogin</label>
			</td>
			<td>
				<input type="text" class="form-control" name="IDCLogin" id="IDCLogin" aria-describedby="IDCLogin" value="<?= $data['IDCLogin']; ?>">
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
					<input type="text" class="form-control" name="<?= $fieldname; ?>" id="<?= $fieldname; ?>" aria-describedby="<?= $fieldname; ?>" value="<?= array_key_exists($fieldname, $data) ? $data[$fieldname] : ''; ?>">
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
