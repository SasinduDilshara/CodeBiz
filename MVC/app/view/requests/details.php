<?php $this->setSiteTitle($this->request->service); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<?php if(currentUser()->userType == 'Customer'): ?>
	<a href="<?=PROOT?>requests" class="btn btn-xs btn-default"> Back</a>
	<?php endif; ?>
	<?php if(currentUser()->userType == 'Provider'): ?>
	<a href="<?=PROOT?>requests/search?area=<?=$this->request->area?>" class="btn btn-xs btn-default"> Back</a>
	<?php endif; ?>




	<h2 class="text-center"><?=$this->request->service?></h2>
	<div class="col-md-6">
		<p><strong><pre> Description :  </strong><?=$this->request->description?></pre></p>
		
	</div>
</div>

<?php $this->end(); ?>