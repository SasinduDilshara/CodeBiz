<?php $this->setSiteTitle( 'Request Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Question was inform to the <?= $this->customer->username ?> </p>

<a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>