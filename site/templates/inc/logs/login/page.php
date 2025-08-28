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
			<th>IP Address</th>
			<th>User</th>
			<th>Success</th>
			<th>Endpoint</th>
			<th>URL</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lines as $line) : ?>
			<?php $entry = explode("\t", $line); ?>
			<?php $logextra = explode('|', $entry[3]); ?>
			<?php $url = parse_url($entry[2]); ?>
			<?php $paths = explode('/', $url['path']); ?>
			<?php $endpoint = $paths[sizeof($paths) - 2]; ?>

			<?php $queries = []; ?>
			<?php parse_str($url['query'], $queries); ?>
			<?php $queries['IDCPassword'] = '--'; ?>

			<tr>
				<td><?= $entry[0]; ?></td>
				<td><?= $logextra[0]; ?></td>
				<td><?= $entry[1]; ?></td>
				<td><?= $logextra[1]; ?></td>
				<td><?= $endpoint; ?></td>
				<td>
					<?= implode('<br>', explode('&', http_build_query($queries))); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
