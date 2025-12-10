<?php
	use SfWebServices\Log\LoginLog;

	/** @var LoginLog $LOG */

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
			<?php $r = $LOG->parseLogRecord($line); ?>
			<tr>
				<td><?= $r->timestamp; ?></td>
				<td><?= $r->ipaddress; ?></td>
				<td><?= $r->username; ?></td>
				<td><?= $r->loginSuccess ? 'true' : 'false'; ?></td>
				<td><?= $r->endpoint; ?></td>
				<td>
					<?php foreach ($r->requestData as $key => $value) : ?>
						<?= $key . '='; ?><?= in_array($key, $r::SENSITIVE_REQUEST_DATA) ? '***' : $value; ?> <br>
					<?php endforeach; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
