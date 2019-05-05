<?php $this->setSiteTitle( 'Verified Email'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="alert alert-dismissible alert-success" style="max-width: 500px; margin:auto; top:5rem;">
  <button type="button" class="close" data-dismiss="alert" onclick="window.location.href='<?=PROOT?>/register/login'">&times;</button>
  <strong>Well done!</strong> Your password Has changed  <br> <a href="<?=PROOT?>/register/login" class="alert-link"> Back to Boardingvibes </a>
</div>

<?php $this->end(); ?>



