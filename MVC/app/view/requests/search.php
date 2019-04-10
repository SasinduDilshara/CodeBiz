<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Results </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Service</th>
		<th> Location</th>
		<th> Customer</th>
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
					   <td><a   
			href="<?=PROOT?>accounts/details/<?=$request->user_id?>">
					<?= $request->customer; ?>
			</a>
		</td>
			</td>
				<td><?= $request->description; ?></td>
				<td>
				 <?php if(!in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
				<a href="<?=PROOT?>requests/accept/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Accept </a>
				<?php endif; ?>
				<?php if(in_array((string)(currentUser()->id),explode(",",$request->providerId))) :?>
				<a href="<?=PROOT?>requests/cancel/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Cancel </a>
				<?php endif; ?>
			</td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>