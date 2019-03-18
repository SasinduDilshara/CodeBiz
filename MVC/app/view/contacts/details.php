<?php $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<a href="<?=PROOT?>contacts" class="btn btn-xs btn-default"> Back</a>
	<h2 class="text-center"><?=$this->contact->displayaddName()?></h2>
	<div class="col-md-6">
		<p><strong><pre> First :  </strong><?=$this->contact->age?></pre></p>
		<p><strong><pre> Email :  </strong><?=$this->contact->email?></pre></p>
		<p><strong><pre> Mobile :  </strong><?=$this->contact->cell_phone?></pre></p>
		<p><strong><pre> Home :  </strong><?=$this->contact->home_phone?></pre></p>
	</div>
	<div class="col-md-6">
		<?=$this->contact->displayAddressLabel()?>
	</div>
</div>

<?php $this->end(); ?>