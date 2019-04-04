<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Results </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Topic</th>
		<th> Location</th>
<!-- 		<th> Description</th> -->
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

				<td><?= $request->area; ?></td>	
				<td><?= $request->description; ?></td>	
				<td><a href="<?=PROOT?>request/accept/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Accept </a></td></td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>