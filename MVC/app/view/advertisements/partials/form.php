<form class="form" action=<?=$this->postAction?> method="post">

	<div><?=$this->displayErrors ?></div>
	<!-- HIIIIIIIIIIIIIIIIIIIIIIIIIII -->
	<?= input_block('text','Topic','topic',$this->advertisement->topic,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Location','area',currentUser()->area,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>

	<br>
	<?= input_block('text','Description','description',$this->advertisement->description,['class'=>'form-control'],['class'=>'form-group col-md-4']) ?>
	
	<div class = "col-md-12 text-right">
		<a href="<?=PROOT?>advertisements" class="btn btn-default"> Cancel </a>

	<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>

	</div>

</form>