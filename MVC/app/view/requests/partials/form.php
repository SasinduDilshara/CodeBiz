<form class="form" action=<?=$this->postAction?> method="post">

	<div><?=$this->displayErrors ?></div>
	<!-- HIIIIIIIIIIIIIIIIIIIIIIIIIII -->
	<?= input_block('text','First name','service',$this->request->service,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Last name','description',$this->request->description,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Address','provider',$this->request->provider,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>


	<div class = "col-md-12 text-right">
		<a href="<?=PROOT?>requests" class="btn btn-default"> Cancel </a>

	<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>

	</div>

</form>