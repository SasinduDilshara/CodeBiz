
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<div id="title" class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;">My Requests</div>
<div class="col-10" style="margin:auto;">
	<?php $x=0 ?>
	<?php foreach($this->requests as $request): ?>
		<?php $x = $x+1; ?>
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
<?php if($x==0): ?>
	<script type="text/javascript">document.getElementById("title").style.display = "none";</script>
	<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    <button type="button" class="close" onclick="window.history.back();" ?>&times;</button>
	<div class="card-body">
        <p class="mb-0"> No Requests yet </p>
    <?php endif; ?>
	</div>
</div>
<?php $this->end(); ?>

