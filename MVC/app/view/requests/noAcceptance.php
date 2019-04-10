<?php $this->setSiteTitle( 'No Acceptance'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> No confirmations yet to the <?= $this->request->service ?> </p>

<a href="<?=PROOT?>requests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>