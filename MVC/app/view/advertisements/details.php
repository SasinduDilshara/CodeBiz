<?php $this->setSiteTitle($this->advertisement->topic) ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>



<div class="col-md-8 col-md-offset-2 well">
	<a href="<?=PROOT?>advertisements" class="btn btn-xs btn-default"> Back</a>
	<h2 class="text-center"><?=$this->advertisement->topic?></h2>
	<div class="col-md-6">
		<p><strong><pre> Description :  </strong><?=$this->advertisement->description?></pre></p>
		<p><strong><pre> Location :  </strong><?=$this->advertisement->area?></pre></p>

	</div>


<?php $this->end(); ?>