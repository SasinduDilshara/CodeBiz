<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Search Results </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> topic</th>
		<th> Description</th>
<!-- 		<th> Description</th> -->
		<th> Location</th>
		<th></th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->advertisements as $advertisement): ?>

			<tr>

				<td>
					<a 
			href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>">
					<?= $advertisement->topic; ?>
				</a>
			</td>

				<td><?= $advertisement->description; ?></td>	
				<td><?= $advertisement->area; ?></td>	
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>