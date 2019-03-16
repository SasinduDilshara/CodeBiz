

<?php $this->start('body'); ?>
<h1 class ="text-center red"> My Contacts </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Name</th>
		<th> age</th>
		<th> Email</th>
		<th> Mobile</th>
		<th> Home_phone</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->contacts as $contact): ?>

			<tr>
				<td><?= $contact->displayName(); ?></td>
				<td><?= $contact->email; ?></td>
				<td><?= $contact->cell_phone; ?></td>
				<td><?= $contact->home_phone; ?></td>
				<td><?= $contact->age; ?></td>
				
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

