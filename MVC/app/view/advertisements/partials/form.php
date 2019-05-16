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
	<div class="form-group col">
		<?= input_block('text','Delivery','delivery',$this->advertisement->delivery,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<div class="form-group col">
		<?= input_block('text','Schedule','schedule',$this->advertisement->schedule,['class'=>'form-control'],['class'=>'form-group']) ?>
	</div>
	<?php switch($this->advertisement->type):
				case 'Cleaning':?>
					<!-- fields unique for cleaning -->
					<?php break;
				case 'Catering':?>
					<div class="form-group col">
						<?= input_block('text','Capacity','capacity',$this->advertisement->capacity,['class'=>'form-control'],['class'=>'form-group']) ?>
					</div>
					<div class="form-group col">
						<?= input_block('text','Menu','menu',$this->advertisement->menu,['class'=>'form-control'],['class'=>'form-group']) ?>
					</div>
					<?php break;
				case 'Laundering':?>
					<div class="form-group col">
						<?= input_block('text','Capacity','capacity',$this->advertisement->capacity,['class'=>'form-control'],['class'=>'form-group']) ?>
					</div>
					<?php break;
			endswitch?>
	<div><?=$this->displayErrors ?></div>
	<div class="form-group" style="text-align: center;">
		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
	</div>
	<div class = "form-group text-center">
	<a href="<?=PROOT?>advertisements" class="btn btn-default"> Cancel </a>
	</div>

</form>