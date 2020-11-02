<?php
	$quote = $args['quote'];
?>
<table class="table table-sm">
	<tr>
		<td>QuoteID</td>
		<td><?= $quote['QuoteID']; ?></td>
	</tr>
	<tr>
		<td>DivisionID</td>
		<td><?= $quote['DivisionID']; ?></td>
	</tr>
	<tr>
		<td>QuoteExpirationDate</td>
		<td><?= $quote['QuoteExpirationDate']; ?></td>
	</tr>
	<tr>
		<td>ShipFromLocation</td>
		<td><?= $quote['ShipFromLocation']; ?></td>
	</tr>
	<tr>
		<td>ProductDescription</td>
		<td><?= $quote['ProductDescription']; ?></td>
	</tr>
	<tr>
		<td>ProductNumber</td>
		<td><?= $quote['ProductNumber']; ?></td>
	</tr>
	<tr>
		<td>RequestQuantity</td>
		<td><?= $quote['RequestQuantity']; ?></td>
	</tr>
	<tr>
		<td>UnitPrice</td>
		<td><?= $quote['UnitPrice']; ?></td>
	</tr>
	<tr>
		<td>ExtPrice</td>
		<td><?= $quote['ExtPrice']; ?></td>
	</tr>
	<tr>
		<td>PriceUOM</td>
		<td><?= $quote['PriceUOM']; ?></td>
	</tr>
	<tr>
		<td>UnitWeight</td>
		<td><?= $quote['UnitWeight']; ?></td>
	</tr>
	<tr>
		<td>ExtendedWeight</td>
		<td><?= $quote['ExtendedWeight']; ?></td>
	</tr>
	<tr>
		<td>BaseQtyUOM</td>
		<td><?= $quote['BaseQtyUOM']; ?></td>
	</tr>
	<tr>
		<td>NextPODate</td>
		<td><?= $quote['NextPODate']; ?></td>
	</tr>
	<tr>
		<td>Discontinued</td>
		<td><?= $quote['Discontinued']; ?></td>
	</tr>
	<tr>
		<td>PackQTY</td>
		<td><?= $quote['PackQTY']; ?></td>
	</tr>
	<tr>
		<td>PiecesPerLB</td>
		<td><?= $quote['PiecesPerLB']; ?></td>
	</tr>
</table>
