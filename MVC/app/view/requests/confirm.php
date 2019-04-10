<?php $this->setSiteTitle( 'Request Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Confirmation was inform to the <?= $this->provider->username ?> </p>

<a href="<?=PROOT?>requests/search" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>