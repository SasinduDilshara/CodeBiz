<?php $this->setSiteTitle("Add Requests"); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<h2 class="text-center"> Add a Request </h2>
	<?php $this->partial('requests','form'); ?>
</div>

<?php $this->end(); ?>