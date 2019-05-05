<?php $this->setSiteTitle( 'Request Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    <button type="button" class="close" onclick="window.location.href='<?=PROOT?>advertisements/ShowConfirmRequests';" ?>&times;</button>
	<div class="card-body">
        <p class="mb-0"> Your question has been informed to <?= $this->provider->username ?> </p>
	</div>
</div>

<?php $this->end(); ?>