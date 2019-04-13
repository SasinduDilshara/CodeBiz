<form class="form" action=<?=$this->postAction?> method="post">
	<div class="form-group col">
		<?= input_block('text','Service','service',$this->request->service,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<div class="form-group col">
		<?= input_block('text','Description','description',$this->request->description,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<div class="form-group col">
		<?= input_block('text','Location','area',$this->request->area,['class'=>'form-control'],['class'=>'form-group']) ?>
		<ul class="list-group" id="result"></ul>
	</div>
	<div><?=$this->displayErrors ?></div>
	<div class="form-group" style="text-align: center;">
		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
	</div>
	<div class = "form-group text-right">
		<a href="<?=PROOT?>requests" class="btn btn-default"> Cancel </a>
	</div>

</form>