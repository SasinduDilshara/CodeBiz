
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> My Requests </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<td>Name</td>
		<th> Service</th>
		<th> Description</th>
		<th> Provider</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->request as $request): ?>
				<?= dnd($request)?>
			<tr>
				<td>
					<a 
					href="<?=PROOT?>requests/details/<?=$request->id?>">
					<?= $request->displayName(); ?>
					</a>
				</td>
				<td><?= $request->service ?></td>
				<td><?= $request->description; ?></td>
				<td><?= $request->provider; ?></td>
				<td><a href="<?=PROOT?>requests/edit/<?=$request->id?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit </a>

				<a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure to Delete <?=$request->displayName()?>')){return false;}"><i class="glyphicon glyphicon-remove"></i> Delete </a></td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

