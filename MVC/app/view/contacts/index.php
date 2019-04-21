
<?php $this->setSiteTitle("Contacts"); ?>
<?php $this->start('body'); ?>
<div class="col-10" style="margin:auto;top:3rem;">
	<div class="form-group row">
	<?php foreach($this->contacts as $contact): ?>
		<div class="card border-primary mb-3" style="margin-right: 6px; margin-left: 6px;width:350px">
			<div class="card-body">
				<h4><?= $contact->displayName(); ?></h4>
				<p class="card-text"><?=$contact->displayAddressLabel()?></p>
				<p class="card-text"><?= $contact->email; ?></p>
				<p class="card-text"><?= $contact->cell_phone; ?></p>
				<p class="card-text"><?= $contact->home_phone; ?></p>
				<a href="<?=PROOT?>contacts/details/<?=$contact->id?>" class="card-link">Details</a>
				<a href="<?=PROOT?>contacts/edit/<?=$contact->id?>" class="card-link">Edit</a>
				<a href="<?=PROOT?>contacts/delete/<?=$contact->id?>" class="card-link" onclick="if(!confirm('Are you sure you want to delete <?=$contact->displayName()?>?')){return false;}"> Delete </a>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>
<?php $this->end(); ?>

