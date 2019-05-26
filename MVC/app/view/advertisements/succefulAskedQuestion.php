<?php $this->setSiteTitle( 'Request Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
	<?php if (currentUser()->userType == "Customer"): ?> 
		<button type="button" class="close" onclick="window.location.href = '<?=PROOT?>advertisements/ShowConfirmRequests';" ?>&times;</button>
	<?php endif; ?>

	<?php if (currentUser()->userType == "Provider"): ?> 
		<button type="button" class="close" onclick="window.location.href = '<?=PROOT?>advertisements/ShowAccept/<?= (string)($this->id)?>/<?=($this->type) ?>';" ?>&times;</button>

	<?php endif; ?>


	
	<div class="card-body">
        <p class="mb-0"> Your Message was informed to the user </p>
	</div>
</div>

<?php $this->end(); ?>