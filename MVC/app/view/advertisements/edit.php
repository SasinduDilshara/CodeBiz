<?php $this->setSiteTitle('Edit Advertisement'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 50rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Edit Advertisement </div>
	<div class="card-body">
        <?= $this->partial('advertisements','form')?>

	</div>
</div>

<?php $this->end(); ?>