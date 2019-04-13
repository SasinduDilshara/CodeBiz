<?php $this->setSiteTitle('Edit Requests'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	
 <h2 class="text-center"> <?php $this->request->displayName()?> </h2>
 <?php $this->partial('requests','form') ?>
<?php $this->end(); ?>