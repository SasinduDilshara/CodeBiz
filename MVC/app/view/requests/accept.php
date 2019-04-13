<?php $this->setSiteTitle( 'Request Accepted'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Acceptence was inform to the <?= $this->owner->username ?> </p>

<a href="<?=PROOT?>requests/search?area=<?= $this->request->area ?>" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>