<?php
	$endpoint = $args['endpoint'];
	$page = $args['page'];
?>
<form action="<?= $page->url; ?>" method="POST">
	<table class="table">
		<tr>
			<th>Param</th>
			<th>Value</th>
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
