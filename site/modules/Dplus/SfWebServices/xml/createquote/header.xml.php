<Result diffgr:id="Result1" msdata:rowOrder="0" diffgr:hasChanges="inserted">
	<?php if ($quote['error'] !== true) : ?>
		<QuoteID><?= $quote['QuoteID']; ?></QuoteID>
		<DivisionID><?= $quote['DivisionID']; ?></DivisionID>
		<QuoteExpirationDate><?= $quote['QuoteExpirationDate']; ?></QuoteExpirationDate>
		<ShipFromLocation><?= $quote['ShipFromLocation']; ?></ShipFromLocation>
		<ProductDescription><?= $quote['ProductDescription']; ?></ProductDescription>
		<ProductNumber><?= $quote['ProductNumber']; ?></ProductNumber>
		<RequestQuantity><?= $quote['RequestQuantity']; ?></RequestQuantity>
		<UnitPrice><?= $quote['UnitPrice']; ?></UnitPrice>
		<ExtPrice><?= $quote['ExtPrice']; ?></ExtPrice>
		<PriceUOM><?= $quote['PriceUOM']; ?></PriceUOM>
		<UnitWeight><?= $quote['UnitWeight']; ?></UnitWeight>
		<ExtendedWeight><?= $quote['ExtendedWeight']; ?></ExtendedWeight>
		<BaseQtyUOM><?= $quote['BaseQtyUOM']; ?></BaseQtyUOM>
		<NextPODate><?= $quote['NextPODate']; ?></NextPODate>
		<Discontinued><?= $quote['Discontinued']; ?></Discontinued>
		<PackQTY><?= $quote['PackQTY']; ?></PackQTY>
		<PiecesPerLB><?= $quote['PiecesPerLB']; ?></PiecesPerLB>
		<ErrorMessage/>
	<?php else : ?>
		<ErrorMessage><?= $quote['message']; ?></ErrorMessage>
	<?php endif;; ?>
</Result>
