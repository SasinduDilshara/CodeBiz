<?php $this->setSiteTitle( 'Cancel Request'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Cancellation was inform to the <?= $this->owner->username ?> </p>

<a href="<?=PROOT?>requests/search" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>