<?php $this->setSiteTitle( 'Send Email'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>


<?php if(currentUser()->userType == "Admin"): ?>
<div class="alert alert-dismissible alert-success" style="max-width: 500px; margin:auto; top:5rem;">
  <button type="button" class="close" data-dismiss="alert" onclick="window.location.href='<?=PROOT?>'">&times;</button>
  Verify Email has been sent.  <br> <a href="<?=PROOT?>/register/login" class="alert-link"> Back to Boardingvibes </a>
</div>
<?php else: ?>

<div class="alert alert-dismissible alert-success" style="max-width: 500px; margin:auto; top:5rem;">
  <button type="button" class="close" data-dismiss="alert" onclick="window.location.href='<?=PROOT?>/register/login'">&times;</button>
  Check out your email to verify your email address  <br> <a href="<?=PROOT?>/register/login" class="alert-link"> Back to Boardingvibes </a>
</div>

<?php endif; ?>

<?php $this->end(); ?>



