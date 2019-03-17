<form class="form" action=<?=$this->postAction?> method="post">

	<div><?=$this->displayErrors ?></div>
	<!-- HIIIIIIIIIIIIIIIIIIIIIIIIIII -->
	<?= input_block('text','Name','name',$this->advertisement->name,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<div>
	    <label for="topic"> Topic</label><br>
	<!-- <pre> -->
	      <input type="radio" name="topic" id="topic"  value="Laundry" checked> Laundry<br>
	      <input type="radio" name="topic" id="topic"  value="Cleaning"> Cleaning<br>
	      <input type="radio" name="topic" id="topic"  value="Meals"> Meals <br>
	  <!-- </pre> -->
	</div>
	<br>
	<?= input_block('text','Description','description',$this->advertisement->description,['class'=>'form-control'],['class'=>'form-group col-md-4']) ?>
	<?= input_block('text','Contact','contactnumber',$this->advertisement->contactnumber,['class'=>'form-control'],['class'=>'form-group col-md-4']) ?>
	<?= input_block('text','Links','links',$this->advertisement->links,['class'=>'form-control'],['class'=>'form-group col-md-6']) ?>
	<div>
	    <label for="customerType"> Delivery service Available</label><br>
	<!-- <pre> -->
	      <input type="radio" name="customerType"name="customerType" id="customerType"   value="delivery" checked> Yes<br>
	      <input type="radio" name="customerType"name="customerType" id="customerType"   value="NoDelivery"> NO <br>
	  <!-- </pre> -->
	</div>
	
	<?= input_block('text','Brand','brand',$this->advertisement->brand,['class'=>'form-control'],['class'=>'form-group col-md-3']) ?>


	<div class = "col-md-12 text-right">
		<a href="<?=PROOT?>advertisements" class="btn btn-default"> Cancel </a>

	<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>

	</div>

</form>