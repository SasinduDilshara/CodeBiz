
<?php $this->setSiteTitle("Advertisements"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> My Advertisements </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Topic</th>
		<th> Description</th>
		<th>Location</th>
		<th>Type</th>
		<th></th>
	</thead>
	<body>
	  <?php foreach($this->alladds as $advertisements): ?>
		<?php foreach($advertisements as $advertisement): ?>

			<tr>

				<td>
					<a 
					href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>">

					<?= $advertisement->topic ?>
				</a>
			</td>
				<td><?= $advertisement->description ?></td>
				<td><?= $advertisement->area ?></td>
				<td><?= $advertisement->type ?></td>
				<td><a href="<?=PROOT?>advertisements/edit/<?=$advertisement->type?>/<?=$advertisement->id?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit </a>

				<a href="<?=PROOT?>advertisements/delete/<?=$advertisement->type?>/<?=$advertisement->id?>" class="btn btn-danger btn-xs"></i> Delete </a></td>
			<td>

				<a href="<?=PROOT?>advertisements/showAccept/<?=$advertisement->id ?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Show Acceptences </a>
			</td>

			</tr>

		<?php endforeach; ?>
	   <?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

