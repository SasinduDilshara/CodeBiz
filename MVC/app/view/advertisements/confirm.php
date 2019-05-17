<?php $this->setSiteTitle( 'Service Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    <button type="button" class="close" onclick="window.history.back();" ?>&times;</button>
	<div class="card-body">
        <p class="mb-0"> Your Confirmation was inform to the <?= $this->customer->username ?> </p>
	</div>
</div>

<?php $this->end(); ?>