<?php $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="container">
	<a href="<?=PROOT?>contacts" class="btn btn-xs btn-default"> Back</a>
<!-- <<<<<<< HEAD -->
	<h2 class="text-center"><?=$this->contact->displayName();?></h2>
	<div class="col-md-6">
<!-- ======= -->
	<div class="col-md-6 bg-light p-3 rounded">
<!-- >>>>>>> 1f1bb71e756f597a12666060c25a04c1b31bb98d -->
		<p><strong><pre> First :  </strong><?=$this->contact->age?></pre></p>
		<p><strong><pre> Email :  </strong><?=$this->contact->email?></pre></p>
		<p><strong><pre> Mobile :  </strong><?=$this->contact->cell_phone?></pre></p>
		<p><strong><pre> Home :  </strong><?=$this->contact->home_phone?></pre></p>
		<?=$this->contact->displayAddressLabel()?>
	</div>
</div>

<?php $this->end(); ?>