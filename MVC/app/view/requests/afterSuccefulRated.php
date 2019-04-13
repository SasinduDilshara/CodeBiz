<?php $this->setSiteTitle( 'Rated Succefully'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> You Succefully rated the <?= $this->servicer->username ?> </p>

<a href="<?=PROOT?>requests/FinishedRequests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>