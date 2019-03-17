<?php $this->setSiteTitle('Edit Advertisement'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">	
 <h2 class="text-center"><?=$this->advertisement->displayName()?></h2>
 <?= $this->partial('advertisements','form')?>
	<!-- <div class="col-md-6">
		<p><strong><pre> Age :  </strong><?=$this->contact->age?></pre></p>
		<p><strong><pre> Email :  </strong><?=$this->contact->email?></pre></p>
		<p><strong><pre> Mobile :  </strong><?=$this->contact->cell_phone?></pre></p>
		<p><strong><pre> Home :  </strong><?=$this->contact->home_phone?></pre></p>
	</div>
	<div class="col-md-6">

	</div>
</div> -->

<?php $this->end(); ?>