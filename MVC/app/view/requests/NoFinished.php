<?php $this->setSiteTitle( 'No Finished'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    <button type="button" class="close" onclick="window.location='<?=PROOT?>';" ?>&times;</button>
	<div class="card-body">
        <p class="mb-0"> No finished requests yet </p>
	</div>
</div>

<?php $this->end(); ?>