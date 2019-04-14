<?php $this->setSiteTitle( 'Request Completed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Completion cancelation was inform to the <?= $this->servicer->username ?> </p>

<a href="<?=PROOT?>requests/FinishedRequests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>