<?php $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		User Details
	</div>
	
	<div class="card-body" style="background-color:#fdfdfe">
		<h4><?= $this->contact->fname; ?></h4>
		<table class="table table-hover">
			<thead>
				<tr>
				<td><strong>  Name :</strong></td>
				<td><?=$this->contact->displayName()?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Email :</strong></td>
				<td><?=$this->contact->email?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Contact :</strong></td>
				<td>
				<?php if($this->contact->cell_phone!=''):?>
					<?=$this->contact->cell_phone?><br>
				<?php endif; ?>
				<?php if($this->contact->home_phone!=''):?>
					<?=$this->contact->home_phone?><br>
				<?php endif; ?>
				</td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Address :</strong></td>
				<td><?=$this->contact->displayAddressLabel()?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Service Type :</strong></td>
				<td><?=$this->contact->serviceType?></td>
				</tr>
			</thead>	
		</table>
		<div class="form-group text-right">
		<a href="<?=PROOT?>contacts" class="btn btn-xs btn-default"> Back</a>
		</div>
	</div>
</div>

<?php $this->end(); ?>