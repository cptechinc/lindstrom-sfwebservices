<?php
	$page = $args['page'];
	$lines = $args['lines'];
?>
<h3>Session</h3>

<table class="table table-sm">
	<thead>
		<tr>
			<th>Date / Time</th>
			<th>IP Address</th>
			<th>User</th>
			<th>Success</th>
			<th>URL</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lines as $line) : ?>
			<?php $entry = explode("\t", $line); ?>
			<?php $logextra = explode('|', $entry[3]); ?>
			<tr>
				<td><?= $entry[0]; ?></td>
				<td><?= $logextra[0]; ?></td>
				<td><?= $entry[1]; ?></td>
				<td><?= $logextra[1]; ?></td>
				<td class="w-50"><?= $entry[2]; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
