<?php $this->setSiteTitle($this->request->service); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<a href="<?=PROOT?>requests" class="btn btn-xs btn-default"> Back</a>
	<h2 class="text-center"><?=$this->request->service?></h2>
	<div class="col-md-6">
		<p><strong><pre> Description :  </strong><?=$this->request->description?></pre></p>
		
	</div>
</div>

<?php $this->end(); ?>