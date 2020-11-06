<?php
	$endpoint = $args['endpoint'];
	$page = $args['page'];
	$data = $args['data'];
	$config = $args['config'];

	$formfields = ['customerItem', 'itemNumber', 'requestQuantity', 'requestUOM', 'customerNumber'];
	$neededfields = array_diff($endpoint->get_fields(), $formfields);
?>
<div class="row">
	<div class="col-sm-4">
		<img src="<?= $config->applogo->url; ?>" alt="">
	</div>
	<div class="col-sm-8">
		<h4>User: <?= $data['IDCLogin']; ?></h4>

		<form action="<?= $page->url; ?>" method="POST">
			<input type="hidden" name="IDCLogin" value="<?= $data['IDCLogin']; ?>">
			<input type="hidden" name="IDCPassword" value="<?= $data['IDCPassword']; ?>">
			<input type="hidden" name="customerNumber" value="<?= $data['customerNumber']; ?>">
			<input type="hidden" name="requestUOM" value="<?= $data['requestUOM']; ?>">

			<table class="table">
				<tr>
					<td>
						<label for="customerItem">Your Part #</label>
					</td>
					<td>
						<input type="text" class="form-control" name="customerItem" id="customerItem" aria-describedby="customerItem">
						<small class="help-text">
							Note: You may enter your part number here as long as we have the item cross-reference created,
							if unsure use the Lindstrom Part # field
						</small>
					</td>
				</tr>
				<tr>
					<td>
						<label for="itemNumber">Lindstrom Part #</label>
					</td>
					<td>
						<input type="text" class="form-control" name="itemNumber" id="itemNumber" aria-describedby="itemNumber">
					</td>
				</tr>
				<tr>
					<td>
						<label for="requestQuantity">Requested Quantity</label>
					</td>
					<td>
						<input type="text" class="form-control" name="requestQuantity" id="requestQuantity" aria-describedby="requestQuantity">
					</td>
				</tr>
			</table>

			<?php foreach ($neededfields as $fieldname) : ?>
				<input type="hidden" class="form-control" name="<?= $fieldname; ?>">
			<?php endforeach; ?>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
