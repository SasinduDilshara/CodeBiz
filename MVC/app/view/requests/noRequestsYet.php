<?php $this->setSiteTitle( 'No Acceptance'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    <button type="button" class="close" onclick="window.location='<?=PROOT?>';" ?>&times;</button>
	<div class="card-body">
        <p class="mb-0"> No confirmations yet </p>
	</div>
</div>

<?php $this->end(); ?>