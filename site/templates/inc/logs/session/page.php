<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>

<div class="row mb-3">
	<div class="col-sm-9">
		<?php include "{$config->paths->templates}inc/logs/date-form.php"; ?>
	</div>
	<div class="col-sm-3">
		<a href="<?= $input->generateUrl(['addToQueryString' => ['download' => 'true']]); ?>" class="btn btn-sm btn-primary position-absolute bottom-0">Download .txt</a>
	</div>
</div>

<table class="table table-sm">
	<thead>
		<tr>
			<th>Date / Time</th>
			<th>User</th>
			<th>URL</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lines as $line) : ?>
			<?php $entry = explode("\t", $line); ?>
			<tr>
				<td><?= $entry[0]; ?></td>
				<td><?= $entry[1]; ?></td>
				<td class="w-50"><?= $entry[2]; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
