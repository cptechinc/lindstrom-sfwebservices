<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}

	$totalPages = ceil($totalLogEntries / 100);
?>

<div class="d-flex w-100 justify-content-between paginator">
	<div></div>
	<div>
		<ul class="pagination">
			<li class="page-item <?= ($input->pageNum == 1) ? 'disabled' : '' ?>">
				<a href="<?= $input->generateUrl(['pagenbr' => $input->pageNum - 1]); ?>" class="page-link paginator-link" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li class="page-item <?= ($input->pageNum == i) ? 'active' : '' ?>">
				<div class="dropdown">
					<a class="page-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Page <?= $input->pageNum; ?> of <?= $totalPages; ?>
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php for ($i = 1; $i < $totalPages; $i++) : ?>
							<?php if ($i > 0) : ?>
								<a class="dropdown-item paginator-link <?= ($input->pageNum == $i) ? 'active' : '' ?>" href="<?= $input->generateUrl(['pagenbr' => $i]) ?>">
									<?= $i ?>
								</a>
							<?php endif; ?>
						<?php endfor; ?>
					</div>
				</div>
			</li>

			<li class="page-item <?= ($input->pageNum == $totalPages) ? 'disabled' : '' ?>">
				<a href="<?= $input->generateUrl(['pagenbr' => $input->pageNum + 1]) ?>" aria-label="Next" class="page-link paginator-link">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</div>
	<div>

	</div>
</div>
