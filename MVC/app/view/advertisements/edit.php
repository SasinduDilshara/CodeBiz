<?php $this->setSiteTitle('Edit Advertisement'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">	
 <h2 class="text-center"><?=$this->advertisement->topic?></h2>
 <?= $this->partial('advertisements','form')?>


<?php $this->end(); ?>