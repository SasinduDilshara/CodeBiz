<form class="form" action=<?=$this->postAction?> method="post">
	<div class="form-group col">
		<?= input_block('text','Topic','topic',$this->advertisement->topic,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<div class="form-group col">
		<?= input_block('text','Description','description',$this->advertisement->description,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<div class="form-group col">
		<?= input_block('text','Location','area',currentUser()->area,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<div><?=$this->displayErrors ?></div>
	<div class="form-group" style="text-align: center;">
		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
	</div>
	<div class = "form-group text-right">
	<a href="<?=PROOT?>advertisements" class="btn btn-default"> Cancel </a>
	</div>

</form>