<?php foreach ($availability as $index => $warehouse) : ?>
	<AvailQTY diffgr:id="AvailQTY<?= $index; ?>" msdata:rowOrder="<?= $index - 1; ?>">
		<WHID><?= $warehouse['WHID']; ?></WHID>
		<QTY><?= $warehouse['QTY']; ?></QTY>
		<QTY_PACKAGE_MAX><?= $warehouse['QTY_PACKAGE_MAX'] + 0; ?></QTY_PACKAGE_MAX>
	</AvailQTY>
<?php endforeach; ?>
