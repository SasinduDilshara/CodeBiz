<?php $this->setSiteTitle($this->request->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<a href="<?=PROOT?>request" class="btn btn-xs btn-default"> Back</a>
	<h2 class="text-center"><?=$this->request->displayName()?></h2>
	<div class="col-md-6">
		<p><strong><pre> Details :  </strong><?=$this->request->service?></pre></p>
		<p><strong><pre> Customer :  </strong><?=$this->request->customer?></pre></p>
		<p><strong><pre> Description :  </strong><?=$this->request->description?></pre></p>
		<p><strong><pre> Provider :  </strong><?=$this->request->provider?></pre></p>
	</div>
</div>

<?php $this->end(); ?>