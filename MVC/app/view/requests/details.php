<?php $this->setSiteTitle($this->request->service); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 40rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Details </div>
	<div class="card-body" style="background-color:#fdfdfe">
		<h4><?= $this->request->service; ?></h4>
		<table class="table table-hover">
			<thead>
			<tr>
				<td><strong> Customer :</strong></td>
				<td><?=$this->request->customer?></td>
				</tr>
				<tr>
				<td><strong>  Description :</strong></td>
				<td><?=$this->request->description?></td>
				</tr>
				<tr>
				<td><strong>  Location :</strong></td>
				<td><?=$this->request->area?></td>
				</tr>
			</thead>
		</table>
		<div class="text-center">
			<?php if(currentUser()):?>
				<?php if(!in_array((string)(currentUser()->id),explode(",",$this->request->reportedBy))):?>
					<a class="btn btn-outline-danger" style="margin: 13px 12px 12px 10px;" href="<?=PROOT?>requests/report/requests/<?=$this->request->id?>/<?=currentUser()->id?>" onclick="if(!confirm('Are you sure you want to report this request?')){return false;}"> Report Advertisement </a>
				<?php endif; ?>
				<?php if(in_array((string)(currentUser()->id),explode(",",$this->request->reportedBy))):?>
					<button class="btn btn-danger" style="margin: 13px 12px 12px 10px;" disabled>Reported</button>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class = "form-group text-right">
				<a onclick="window.history.back();" class="btn btn-default"> Back </a>
			</div>
	</div>
</div>

<?php $this->end(); ?>