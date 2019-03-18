<?php $this->setSiteTitle("Add Advertisements"); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<h2 class="text-center"> Add a Advertisement </h2>
	<?php $this->partial('advertisements','form') ?>
</div>

<?php $this->end(); ?>