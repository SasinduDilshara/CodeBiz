
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<!-- <h1 class ="text-center red"> My Requests </h1> -->
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:3rem;">My Requsets</div>
<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
		<thead>
			<tr class="table-light">
			<th scope="col">Topic</th>
			<th scope="col">Description</th>
			<th scope="col">Location</th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->requests as $request): ?>
				<tr>
					<th scope="row">
						<a href="<?=PROOT?>requests/details/<?=$request->id?>" class="card-link"><?= $request->service; ?></a>
					</th>
					<td><?= $request->description; ?></td>
					<td><?= $request->area; ?></td>
					<td>
					<a href="<?=PROOT?>requests/edit/<?=$request->id?>" class="card-link">Edit</a>
					<a href="<?=PROOT?>requests/showAccept/<?=$request->id?>" class="card-link">Show Acceptences </a>
					<a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="card-link" style="" onclick="if(!confirm('Are you sure you want to delete <?=$request->service;?>?')){return false;}">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<?php $this->end(); ?>

