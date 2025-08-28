<form action="./" method="GET">
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