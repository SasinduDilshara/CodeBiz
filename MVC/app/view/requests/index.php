
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<!-- <h1 class ="text-center red"> My Requests </h1> --><br>
<div class="col-10" style="margin:auto;top:3rem;">
	<?php foreach($this->requests as $request): ?>
		<div class="card border-primary mb-3" style="">
			<div class="card-body">
				<h4><?= $request->service; ?></h4>
				<p class="card-text"><?= $request->description; ?></p>
				<a href="<?=PROOT?>requests/details/<?=$request->id?>" class="card-link">Details</a>
				<a href="<?=PROOT?>requests/edit/<?=$request->id?>" class="card-link">Edit</a>
				<a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="card-link" style="" onclick="if(!confirm('Are you sure you want to delete <?=$request->service;?>?')){return false;}">Delete</a>
				<a href="<?=PROOT?>requests/showAccept/<?=$request->id?>" class="card-link">Show Acceptences </a>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php $this->end(); ?>

