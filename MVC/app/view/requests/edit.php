<?php $this->setSiteTitle('Edit Requests'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Edit Request </div>
	<div class="card-body">
		<?php $this->partial('requests','form'); ?>
	</div>
</div>

<?php $this->end(); ?>