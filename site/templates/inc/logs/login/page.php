<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>

<form action="./" class="mb-3" method="GET">
	<input type="hidden" name="filter" value="filter">

	<div class="form-row">
		<div class="col-sm-3">
			<label for="fromDate">From Date</label>
		</div>
		<div class="col-sm-3">
			<label for="toDate">To Date</label>
		</div>
	</div>
	<div class="form-row">
		<div class="col-sm-3">
			<?= render_php("{$config->paths->templates}inc/util/date-picker.php", ['name' => 'fromDate', 'val' => $input->get->text('fromDate'), 'label' => 'From Date']) ; ?>
		</div>
		<div class="col-sm-3">
			<?= render_php("{$config->paths->templates}inc/util/date-picker.php", ['name' => 'toDate', 'val' => $input->get->text('toDate'), 'label' => 'To Date']) ; ?>
		</div>
		<div class="col-sm-3">
			<button type="submit" class="btn btn-sm btn-primary">Submit</button>

			<?php if ($input->get->offsetExists('filter')) : ?>
				<a href="./" class="btn btn-sm btn-warning">Clear Filter</a>
			<?php endif; ?>
		</div>
	</div>
</form>

<div class="row">
	<div class="col-sm-3">
		<a href="./?download=true" class="btn btn-primary">Download .txt</a>
	</div>
</div>

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
