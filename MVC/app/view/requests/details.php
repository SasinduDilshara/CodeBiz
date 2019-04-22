<?php $this->setSiteTitle($this->request->service); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 40rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		Request Details
	</div>
	<div class="card-body" style="background-color:#fdfdfe">
		<h4><?= $this->request->service; ?></h4>
		<table class="table table-hover">
			<thead>
				<tr class="table-light">
				<td><strong>  Description :</strong></td>
				<td><?=$this->request->description?></td>
				</tr>
			</thead>
		</table>
		<div class="form-group text-right">
			<?php if(currentUser()->userType == 'Customer'): ?>
				<a href="<?=PROOT?>requests" class="btn btn-xs btn-default"> Back</a>
			<?php endif; ?>
			<?php if(currentUser()->userType == 'Provider'): ?>
				<a href="<?=PROOT?>requests/search?area=<?=$this->request->area?>" class="btn btn-xs btn-default"> Back</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php $this->end(); ?>