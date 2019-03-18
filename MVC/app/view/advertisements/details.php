
<?php $this->setSiteTitle($this->advertisement->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="container">
	<a href="<?=PROOT?>advertisements" class="btn btn-xs btn-default"> Back</a>
	<h2 class="text-center"><?=$this->advertisement->displayName()?></h2>
	<div class="col-md-6 bg-light p-3 rounded">
		<p><strong><pre> Name :  </strong><?=$this->advertisement->name?></pre></p>
		<p><strong><pre> Topic :  </strong><?=$this->advertisement->topic?></pre></p>
		<p><strong><pre> Brand :  </strong><?=$this->advertisement->brand?></pre></p>
		<p><strong><pre> Description :  </strong><?=$this->advertisement->description?></pre></p>
		<p><strong><pre> Delivery :  </strong><?=$this->advertisement->customerType?></pre></p>
		<p><strong><pre> Photos :  </strong><?=$this->advertisement->links?></pre></p>
		<?=$this->advertisement->displayAddLabel()?>
	</div>
</div>

<?php $this->end(); ?>