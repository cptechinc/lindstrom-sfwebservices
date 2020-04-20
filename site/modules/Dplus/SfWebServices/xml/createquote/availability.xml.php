<?php foreach ($availability as $index => $warehouse) : ?>
	<AvailQTY diffgr:id="AvailQTY<?= $index; ?>" msdata:rowOrder="<?= $index; ?>">
		<WHID><?= $warehouse['WHID']; ?></WHID>
		<QTY><?= $warehouse['QTY']; ?></QTY>
		<QTY_PACKAGE_MAX><?= $warehouse['_PACKAGE_MAX']; ?></QTY_PACKAGE_MAX>
	</AvailQTY>
<?php endforeach; ?>
