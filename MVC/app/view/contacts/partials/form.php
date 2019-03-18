<form class="form" action=<?=$this->postAction?> method="post">

	<div><?=$this->displayErrors ?></div>
	<!-- HIIIIIIIIIIIIIIIIIIIIIIIIIII -->
	<?= input_block('text','First name','fname',$this->contact->fname,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Last name','lname',$this->contact->lname,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Address','address',$this->contact->address,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','City','city',$this->contact->city,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Email','email',$this->contact->email,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<?= input_block('text','Service','service',$this->contact->service,['class'=>'form-control'],['class'=>'form-group col-md-4']) ?>
	<?= input_block('text','Home Phone','home_phone',$this->contact->home_phone,['class'=>'form-control'],['class'=>'form-group col-md-3']) ?>
	<?= input_block('text','Mobile','cell_phone',$this->contact->cell_phone,['class'=>'form-control'],['class'=>'form-group col-md-3']) ?>
	<?= input_block('text','Work_phone','work_phone',$this->contact->work_phone,['class'=>'form-control'],['class'=>'form-group col-md-3']) ?>
	<?= input_block('text','State','state',$this->contact->state,['class'=>'form-control'],['class'=>'form-group col-md-4']) ?>
	<?= input_block('text','Service Type','serviceType',$this->contact->serviceType,['class'=>'form-control'],['class'=>'form-group col-md-4']) ?>

	<div class = "col-md-12 text-right">
		<a href="<?=PROOT?>contacts" class="btn btn-default"> Cancel </a>

	<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>

	</div>

</form>