
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
				<td>
					<?= $request->description; ?>
						
				</td>
				<td>
				<?php if(!in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
				<a href="<?=PROOT?>requests/accept/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Accept </a>
				<?php endif; ?>

				<?php if(in_array((string)(currentUser()->id),explode(",",$request->providerId))) :?>
				<a href="<?=PROOT?>requests/cancel/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Cancel </a>
				<?php endif; ?>
				<td>
				<td>
					<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Ask Doubts </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>
			</tr>
		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

