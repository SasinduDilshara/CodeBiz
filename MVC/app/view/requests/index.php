
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;">My Requests</div>
<div class="col-10" style="margin:auto;">
	<?php foreach($this->requests as $request): ?>
		<div class="card border-primary mb-3" style="">
			<div class="card-body">
				<a href="<?=PROOT?>requests/details/<?=$request->id?>" ><h4><?= $request->service; ?></h4></a>				
				<p class="card-text"><?= $request->description; ?></p>
				<a href="<?=PROOT?>requests/edit/<?=$request->id?>" class="btn btn-outline-secondary">Edit</a>
				<a href="<?=PROOT?>requests/showAccept/<?=$request->id?>" class="btn btn-outline-primary">Show Acceptences </a>
				<a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="btn btn-outline-danger" style="" onclick="if(!confirm('Are you sure you want to delete <?=$request->service;?>?')){return false;}">Delete</a>
				
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php $this->end(); ?>

