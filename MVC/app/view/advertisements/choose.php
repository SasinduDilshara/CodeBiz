<?php $this->setSiteTitle('Edit Advertisement'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;padding-bottom:2rem;">
	Choose the addvertisement 
</div>
<div class="list-group" style="max-width: 20rem; margin:auto;">
  <a href="<?=PROOT?>advertisements/add/Cleaning" class="list-group-item list-group-item-action">
    Cleaning
  </a>
  <a href="<?=PROOT?>advertisements/add/Catering" class="list-group-item list-group-item-action">Catering
  </a>
  <a href="<?=PROOT?>advertisements/add/Laundering" class="list-group-item list-group-item-action">Laundry
  </a>
</div>

<?php $this->end(); ?>