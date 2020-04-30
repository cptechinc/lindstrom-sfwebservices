<?php $items = $args['items']; ?>
<div class="list-group">
	<?php foreach ($items as $item) : ?>
		<a href="<?= $item->url; ?>" class="list-group-item list-group-item-action">
			<div class="row align-items-center">
				<div class="col-11">
					<p class="h5">
						<?= $item->title; ?>
					</p>
				</div>
			</div>
		</a>
	<?php endforeach; ?>
</div>
