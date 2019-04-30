<?php $this->setSiteTitle("Add Contacts"); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 50rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Add Contact </div>
	<div class="card-body">
		<?php $this->partial('contacts','form'); ?>
	</div>
</div>

<?php $this->end(); ?>