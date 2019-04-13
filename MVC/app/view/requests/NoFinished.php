<?php $this->setSiteTitle( 'No Finished'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> No finished requests yet. </p>

<a href="<?=PROOT?>requests" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>