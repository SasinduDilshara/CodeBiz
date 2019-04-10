
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> My Requests </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Service</th>
		<th> Description</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->requests as $request): ?>

			<tr>
				<td>
					<a 
					href="<?=PROOT?>requests/details/<?=$request->id?>">

					<?= $request->service; ?>
					</a>
				</td>
				<td><?= $request->description; ?></td>
				<td><a href="<?=PROOT?>requests/edit/<?=$request->id?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit </a>

				<a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure to Delete <?=$request->service;?>')){return false;}"><i class="glyphicon glyphicon-remove"></i> Delete </a>

				<a href="<?=PROOT?>requests/showAccept/<?=$request->id?>" class="btn btn-danger btn-xs"></i> Show Acceptences </a>

			</td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

