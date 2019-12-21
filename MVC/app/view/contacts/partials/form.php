<form class="form" action=<?=$this->postAction?> method="post">

	<div class="form-row col">
		<?= input_block('text','First name','fname',$this->contact->fname,['class'=>'form-control'],['class'=>'form-group col']) ?>
		<?= input_block('text','Last name','lname',$this->contact->lname,['class'=>'form-control'],['class'=>'form-group col']) ?>
	</div>
	<div class="form-row col">
		<?= input_block('text','Address','address',$this->contact->address,['class'=>'form-control'],['class'=>'form-group col']) ?>
		<?= input_block('text','City','city',$this->contact->city,['class'=>'form-control'],['class'=>'form-group col']) ?>
	</div>
	<?= input_block('text','State','state',$this->contact->state,['class'=>'form-control'],['class'=>'form-group col-6']) ?>
	<div class="form-row col">
		<?= input_block('text','Home Phone','home_phone',$this->contact->home_phone,['class'=>'form-control'],['class'=>'form-group col']) ?>
		<?= input_block('text','Mobile','cell_phone',$this->contact->cell_phone,['class'=>'form-control'],['class'=>'form-group col']) ?>
	</div>
	<?= input_block('text','Work Phone','work_phone',$this->contact->work_phone,['class'=>'form-control'],['class'=>'form-group col-6']) ?>
	<?= input_block('text','Email','email',$this->contact->email,['class'=>'form-control'],['class'=>'form-group col-6']) ?>
	<div class="form-row col">
		<?= input_block('text','Service','service',$this->contact->service,['class'=>'form-control'],['class'=>'form-group col-6']) ?>
		<?= input_block('text','Service Type','serviceType',$this->contact->serviceType,['class'=>'form-control'],['class'=>'form-group col-6']) ?>
	</div>
	<div><?=$this->displayErrors ?></div>
	<div class="form-group" style="text-align: center;">
		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
	</div>
	<div class = "form-group text-right">
		<a href="" onclick="window.history.back();" class="btn btn-default"> Cancel </a>
	</div>

</form>