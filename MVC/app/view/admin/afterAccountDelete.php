<?php $this->setSiteTitle( 'Send Email'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>


<div class="alert alert-dismissible alert-success" style="max-width: 500px; margin:auto; top:5rem;">
  <button type="button" class="close" data-dismiss="alert" onclick="window.location.href='<?=PROOT?>'">&times;</button>
  You Delete the user account of <?= $this->username ?>    </a>
</div>


<?php $this->end(); 