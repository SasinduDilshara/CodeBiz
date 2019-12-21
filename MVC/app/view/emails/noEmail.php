<?php $this->setSiteTitle( 'Verified Email'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="alert alert-dismissible alert-danger" style="max-width: 500px; margin:auto; top:5rem;">
  <button type="button" class="close" data-dismiss="alert" onclick="window.location.href='<?=PROOT?>'">&times;</button>
  <strong>OOPs!</strong> There is no email matching for your input  <br> <a href="<?=PROOT?>" class="alert-link"> Back to Boardingvibes </a>
</div>

<?php $this->end(); ?>



