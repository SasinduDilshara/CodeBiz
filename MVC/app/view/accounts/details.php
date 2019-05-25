<?php $this->setSiteTitle($this->account->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		User Details
	</div>
	
	<div class="card-body" style="background-color:#fdfdfe">
		<h4><?= $this->account->fname; ?></h4>
		<table class="table table-hover">
			<thead>
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
				<td>
					<?=$this->account->phoneNumber?><br>
				</td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Area :</strong></td>
				<td>
					<?=$this->account->area?><br>
				</td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Address :</strong></td>
				<td><?=$this->account->displayAddressLabel()?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Rating :</strong></td>
				<td><div class="progress">
  						<div class="progress-bar" role="progressbar" style="width: <?=round($this->account->overallRating,1)*20?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<?=round($this->account->overallRating,1)?>/5.0 (out of <?=$this->account->ratingtimes?>)
				</td>
				</tr>
			</thead>
		</table>
		<div class="text-center">
			<?php if(currentUser()):?>
				<?php if(!in_array((string)(currentUser()->id),explode(",",$this->account->reportedBy))):?>
					<a class="btn btn-outline-danger" style="margin: 13px 12px 12px 10px;" href="<?=PROOT?>register/report/register/<?=$this->account->id?>/<?=currentUser()->id?>" onclick="if(!confirm('Are you sure you want to report this account?')){return false;}" style="margin: 13px 12px 12px 10px;">Report Account</a>
					<?php endif; ?>
			<?php endif; ?>
			<?php if(in_array((string)(currentUser()->id),explode(",",$this->account->reportedBy))):?>
			<button class="btn btn-danger" style="margin: 13px 12px 12px 10px;" disabled>Reported</button>
			<?php endif; ?> <br>
			<a onclick="window.history.back();" style="margin: 13px 12px 12px 10px;">Back</a>
		</div>		
	</div>

</div>

<?php $this->end(); ?>

						