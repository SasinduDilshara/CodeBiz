<?php $this->setSiteTitle( 'Request Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Message was inform to the <?= $this->provider->username ?> </p>

<a href="<?=PROOT?>advertisements/ShowConfirmRequests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>