<?php $this->setSiteTitle('Message'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
<form class="form" action=<?=$this->postAction?> method="post">
	
 <h2 class="text-center"> Message</h2>

 		<?= input_block('text','chat','chat','',['class'=>'form-control'],['class'=>'form-group']) ?>
 </div>

 	<div class="form-group" style="text-align: center;">
		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
	</div>
	<div class = "form-group text-right">
		<a href="<?=PROOT?>advertisements/ShowConfirmRequests" class="btn btn-default"> Cancel </a>
	</div>

<?php $this->end(); ?>