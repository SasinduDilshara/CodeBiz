<?php $this->setSiteTitle("View Accounts"); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary-mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		<h4 style="margin-bottom: 0px;"><?=$this->account->username?></h4>
	</div>
	
	<div class="card-body" style="background-color:#fdfdfe">
		<table class="table table-hover">
			<thead>
				<tr class="table-light">
				<td><strong>  Name :</strong></td>
				<td><?=$this->account->displayName()?></td>
				</tr>
			</thead>
			<thead>
				<tr class="table-light">
				<td><strong>  Email :</strong></td>
				<td><?=$this->account->email?></td>
				</tr>
			</thead>
			<thead>
				<tr class="table-light">
				<td><strong>  Contact :</strong></td>
				<td>+94<?=$this->account->phoneNumber?></td>
				</tr>
			</thead>
			<thead>
				<tr class="table-light">
				<td><strong>  Address :</strong></td>
				<td><?=$this->account->displayAddress()?></td>
				</tr>
			</thead>
			<thead>
				<tr class="table-light">
				<td><strong>  Type of User :</strong></td>
				<td><?=$this->account->displayType()?></td>
				</tr>
			</thead>	
		</table>
		<div class="text-center">
			<a href="<?=PROOT?>accounts/edit/<?=$this->account->id?>" class="btn btn-outline-primary" style="margin: 13px 12px 12px 10px;">Edit</a>
			<a href="<?=PROOT?>accounts/delete/<?=$this->account->id?>" class="btn btn-outline-danger" style="margin: 13px 12px 12px 10px;">Delete Account</a>
			<a href="<?=PROOT?>home" class="btn btn-outline-secondary" style="margin: 13px 12px 12px 10px;">Back</a>
		</div>
	</div>

</div>

<?php $this->end(); ?>