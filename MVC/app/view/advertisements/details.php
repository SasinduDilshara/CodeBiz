<?php $this->setSiteTitle($this->advertisement->topic) ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		Details
	</div>
	
	<div class="card-body" style="background-color:#fdfdfe">
		<h4 class="text-center"><?=$this->advertisement->topic?></h4>
		<?php if($this->advertisement->type=="Cleaning"): ?>
			<div style="background: url(<?=PROOT?>img/upload/<?= $this->advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/cleaning.jpg);
				background-size: cover;
				width: 200px;
				height: 200px;
				margin: auto;
				border-radius: 50%;
				border-style: outset;"></div>
		<?php elseif($this->advertisement->type=="Catering"): ?>
			<div style="background: url(<?=PROOT?>img/upload/<?= $this->advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/cooking.jpg);
				background-size: cover;
				width: 200px;
				height: 200px;
				margin: auto;
				border-radius: 50%;
				border-style: outset;"></div>
		<?php elseif($this->advertisement->type=="Laundering"): ?>
			<div style="background: url(<?=PROOT?>img/upload/<?= $this->advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/laundry.jpg);
				background-size: cover;
				width: 200px;
				height: 200px;
				margin: auto;
				border-radius: 50%;
				border-style: outset;"></div>
		<?php endif; ?><br>
		<table class="table table-hover">
			<thead>
				<tr>
				<td><strong>  Service Type :</strong></td>
				<td><?=$this->advertisement->type?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Description :</strong></td>
				<td><?=$this->advertisement->description?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Location :</strong></td>
				<td><?=$this->advertisement->area?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Delivery :</strong></td>
				<td><?=$this->advertisement->delivery?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Schedule :</strong></td>
				<td><?=$this->advertisement->schedule?></td>
				</tr>
			</thead>
			<?php switch($this->advertisement->type):
				case 'Cleaning':?>
					<!-- fields unique for cleaning -->
					<?php break;
				case 'Catering':?>
					<thead>
						<tr>
						<td><strong>  Capacity :</strong></td>
						<td><?=$this->advertisement->capacity?></td>
						</tr>
					</thead>
					<thead>
						<tr>
						<td><strong>  Menu :</strong></td>
						<td><?=$this->advertisement->menu?></td>
						</tr>
					</thead>
					<?php break;
				case 'Laundering':?>
					<thead>
						<tr>
						<td><strong>  Capacity :</strong></td>
						<td><?=$this->advertisement->capacity?></td>
						</tr>
					</thead>
					<?php break;
			endswitch?>
			
		</table>
		<div class="text-center">
		<?php if(currentUser() && currentUser()->userType == 'Customer'):?>
			<?php if(!in_array((string)(currentUser()->id),explode(",",$this->advertisement->reportedBy))):?>
				<a class="btn btn-outline-danger" style="margin: 13px 12px 12px 10px;" href="<?=PROOT?>advertisements/report/advertisements/<?=$this->advertisement->id?>/<?=currentUser()->id?>/<?= $this->advertisement->type?>" onclick="if(!confirm('Are you sure you want to report this advertisement?')){return false;}"> Report This Add </a>
			<?php endif; ?>
		<?php endif; ?>
		<?php if(in_array((string)(currentUser()->id),explode(",",$this->advertisement->reportedBy))):?>
			<button class="btn btn-danger" style="margin: 13px 12px 12px 10px;" disabled>Reported</button> 
		<?php endif; ?>
		<div class = "form-group text-right">
			<a onclick="window.history.back();" class="btn btn-default"> Back </a>
		</div>
		</div>
	</div>
</div>

<?php $this->end(); ?>