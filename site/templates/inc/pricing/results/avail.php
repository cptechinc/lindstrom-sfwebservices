<?php
	$availability = $args['availability'];
?>
<table class="table table-sm">
	<thead>
		<tr>
			<th>WHID</th>
			<th class="text-right">QTY</th>
			<th class="text-right">QTY_PACKAGE_MAX</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($availability as $item) : ?>
			<tr>
				<td><?= $item['WHID']; ?></td>
				<td class="text-right"><?= $item['QTY']; ?></td>
				<td class="text-right"><?= $item['QTY_PACKAGE_MAX']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
