<!-- <p>results</p> -->
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:3rem;"></div>
<?php $this->setSiteTitle("Requests"); ?>
<div class="col-10" style="margin:auto;">
	<?php foreach($this->alladds as $request): ?>
		<div class="card border-primary mb-3" style="">
			<div class="card-body">
				<h4><?= $request->service; ?></h4>
				<p class="card-text"><?= $request->description; ?></p>
				
				 
				
				
				<p class="card-text"><strong>Reported Times : </strong><?= $request->reported ?></p>

				<a href="<?=PROOT?>requests/details/<?=$request->id?>" class="card-link">Details</a>
				<a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="card-link" style="" onclick="if(!confirm('Are you sure you want to delete <?=$request->service;?>?')){return false;}">Delete</a>

			</div>
		</div>
	<?php endforeach; ?>
</div>

