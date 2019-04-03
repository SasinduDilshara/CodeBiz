<form class="form" action=<?=$this->postAction?> method="post">

	<div><?=$this->displayErrors ?></div>
	<!-- HIIIIIIIIIIIIIIIIIIIIIIIIIII -->
	<?= input_block('text','Service','service',$this->request->service,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Description','description',$this->request->description,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>

		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
		
	<div class = "col-md-12 text-right">
		<a href="<?=PROOT?>requests" class="btn btn-default"> Cancel </a>



	</div>

</form>