<?php $this->setSiteTitle("View Accounts"); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		User Details
	</div>
	
	<div class="card-body" style="background-color:#fdfdfe">
		<table class="table table-hover">
			<thead>
			<tr>
				<form action="<?=PROOT?>accounts/upload/<?=currentUser()->id?>" method="POST" enctype="multipart/form-data">
				<input type="file" name="file" id="">
				<button type="submit" name="submit">UPLOAD</button>
				</form>
			</tr>
				<tr>
				<td><strong>  Name :</strong></td>
				<td><?=$this->account->displayName()?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Email :</strong></td>
				<td><?=$this->account->email?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Contact :</strong></td>
				<td><?=$this->account->phoneNumber?>
				<?php if($this->account->phoneNumber2 != ''):?>
				<br><?=$this->account->phoneNumber2?></td>
				<?php endif ?>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Address :</strong></td>
				<td><?=$this->account->displayAddress()?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  User Rating :</strong></td>
				<td><div class="progress">
  						<div class="progress-bar" role="progressbar" style="width: <?=round($this->account->overallRating,1)*20?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<?=round($this->account->overallRating,1)?>/5.0 (out of <?=$this->account->ratingtimes?>)
				</td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Type of User :</strong></td>
				<td><?=$this->account->displayType()?></td>
				</tr>
			</thead>	
		</table>
		<div class="text-center">
			<a href="<?=PROOT?>accounts/edit/<?=$this->account->id?>" class="btn btn-outline-primary" style="margin: 13px 12px 12px 10px;">Edit</a>
			<a href="<?=PROOT?>accounts/delete/<?=$this->account->id?>" class="btn btn-outline-danger" style="margin: 13px 12px 12px 10px;" onclick="if(!confirm('Are you sure you want to delete your account?'<br>'THIS ACTION CANNOT BE UNDONE')){return false;}">Delete Account</a>
			<a href="<?=PROOT?>home" class="btn btn-outline-secondary" style="margin: 13px 12px 12px 10px;">Back</a>
		</div>
	</div>

</div>

<?php $this->end(); ?>