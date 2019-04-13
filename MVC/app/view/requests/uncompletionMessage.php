<?php $this->setSiteTitle( 'Request Completed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Completion cancelation was inform to the <?= $this->servicer->username ?> </p>

<a href="<?=PROOT?>requests/confirmed" class="btn btn-xs btn-default"> Finish</a>

<?php $this->end(); ?>