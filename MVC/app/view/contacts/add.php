<?php $this->setSiteTitle("Add Contacts"); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<h2 class="text-center"> Add a Contact </h2>
	<?php $this->partial('contacts','form'); ?>
</div>

<?php $this->end(); ?>