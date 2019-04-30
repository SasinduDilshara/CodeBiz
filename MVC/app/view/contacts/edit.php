<?php $this->setSiteTitle('Edit Contact'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 50rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Edit Contact </div>
	<div class="card-body">
		<?= $this->partial('contacts','form')?>

	</div>
</div>

<?php $this->end(); ?>