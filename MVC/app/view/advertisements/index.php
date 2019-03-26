
<?php $this->setSiteTitle("Advertisements"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> My Advertisements </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Name</th>
		<th> Topic</th>
		<th> Brand</th>
		<th> Description</th>
		<th> Type of Customer</th>
		<th></th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->advertisements as $advertisement): ?>

			<tr>

				<td>
					<a 
					href="<?=PROOT?>advertisements/details/<?=$advertisement->id?>">

					<?= $advertisement->location ?>
				</a>
			</td>
				<td><?= $advertisement->topic; ?></td>
				<td><?= $advertisement->brand; ?></td>
				<td><?= $advertisement->description; ?></td>
				<td><?= $advertisement->customerType; ?></td>
				<td><a href="<?=PROOT?>advertisements/edit/<?=$advertisement->id?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit </a>

				<a href="<?=PROOT?>advertisements/delete/<?=$advertisement->id?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure to Delete <?=$advertisement->displayName()?>')){return false;}"><i class="glyphicon glyphicon-remove"></i> Delete </a></td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

