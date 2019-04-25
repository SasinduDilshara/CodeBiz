<?php $this->setSiteTitle("Add Advertisements"); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Add Advertisement </div>
	<div class="card-body">
		<?php $this->partial('advertisements','form') ?>
	</div>
</div>

<?php $this->end(); ?>