
<?php $this->setSiteTitle("Contacts"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> My Contacts </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Name</th>
		<th> Email</th>
		<th> Mobile</th>
		<th> Home_phone</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->contacts as $contact): ?>

			<tr>
				<td>
					<a 
					href="<?=PROOT?>contacts/details/<?=$contact->id?>">
					<?= $contact->displayName(); ?>
					</a>
				</td>
				<td><?= $contact->email; ?></td>
				<td><?= $contact->cell_phone; ?></td>
				<td><?= $contact->home_phone; ?></td>
				<td><a href="<?=PROOT?>contacts/edit/<?=$contact->id?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit </a>

				<a href="<?=PROOT?>contacts/delete/<?=$contact->id?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure to Delete <?=$contact->displayName()?>')){return false;}"><i class="glyphicon glyphicon-remove"></i> Delete </a></td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

