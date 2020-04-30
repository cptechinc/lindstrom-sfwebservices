<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>
<div class="card bg-transparent" role="alert">
	<div class="container">
		<div class="row">
			<div class="col-1 d-flex justify-content-center align-items-center bg-<?= $type; ?> text-white">
				<span data-notify="icon"><i class="<?= $iconclass; ?>" aria-hidden="true"></i></span>
			</div>
			<div class="col-11 alert-<?= $type; ?>">
				<span data-notify="title" class="h5"><?= $title; ?></span>
				<div class="notify-message"><?= $message; ?></div>
			</div>
		</div>
	</div>
</div>
