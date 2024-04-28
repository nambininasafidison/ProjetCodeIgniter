<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>
<style>
nav ul li a{
	display:'block';
	text-decoration:none;
	color:black;
}
.active{
	background-color:grey;
}
nav ul li p{
	padding-left:2vw;
}
nav{
	margin-top:4vw;
}
</style>

<nav class='container bg-secondary'  aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination container d-flex w-full">
		<?php if ($pager->hasPrevious()) : ?>
			<li>
				<p><a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
					<span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a></p>
			</li>
			<li>
				<p><a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a></p>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="active"' : '' ?>>
				<p class="container"><a href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a></p>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li>
				<p><a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a></p>
			</li>
			<li>
				<p><a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a></p>
			</li>
		<?php endif ?>
	</ul>
</nav>
