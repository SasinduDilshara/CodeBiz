<?php $this->setSiteTitle( 'Request Completed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Completion was inform to the <?= $this->servicer->username ?> </p>

<a href="<?=PROOT?>register/confirmed/<?= $this->servicer->id ?>" class="btn btn-xs btn-default"> Rate servicer </a>
<a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>