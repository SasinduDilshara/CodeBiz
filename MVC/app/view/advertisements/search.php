<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Search Results </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Name</th>
		<th> Brand</th>
		<th> Description</th>
		<th></th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->advertisements as $advertisement): ?>

			<tr>

				<td>
					<a 
					href="<?=PROOT?>advertisements/details/<?=$advertisement->id?>">
					<?= $advertisement->area; ?>
				</a>
			</td>

				<td><?= $advertisement->description; ?></td>	
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>