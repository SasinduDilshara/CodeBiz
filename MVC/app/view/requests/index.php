
<?php $this->setSiteTitle("Requests"); ?>
<?php $this->start('body'); ?>
<style>
.photo 
{
	background: url(<?=PROOT?>img/requests.png) 50% 50% no-repeat;
	background-size: cover;
	width: 150px;
	height: 150px;
	margin: auto;
	border-radius: 50%;
	border-style: outset;
}
</style>
<div id="title" class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:3rem;padding-top:5rem;text-shadow: 3px 4px 5px #000;">Requests</div>
<div class="col" style="display: flex;flex-wrap: wrap;margin:auto;top:3rem;max-width:95%">
	<div class="form-group row">
	<?php $x=0 ?>
	<?php foreach($this->requests as $request): ?>
		<?php $x = $x+1; ?>
		<div class="card border-primary mb-3" style="max-width:690px;margin:12px;width:100%">
			<div class="card-body">
				<div class="d-flex">
					<div class="p-2">
						<div class="photo"></div>
					</div>
					<div class="align-self-start">
						<a href="<?=PROOT?>requests/details/<?=$request->id?>" ><h4><?= $request->service; ?></h4></a>				
						<p class="card-text"><?= $request->description; ?></p>
					</div>
				</div>
				<div class="d-flex">
					<div class="p-2"><a href="<?=PROOT?>requests/edit/<?=$request->id?>" class="btn btn-outline-secondary">Edit</a></div>
					<div class="mr-auto p-2"><a href="<?=PROOT?>requests/showAccept/<?=$request->id?>" class="btn btn-outline-primary">Show Acceptences </a></div>
					<div class="p-2"><a href="<?=PROOT?>requests/delete/<?=$request->id?>" class="btn btn-outline-danger" style="" onclick="if(!confirm('Are you sure you want to delete <?=$request->service;?>?')){return false;}">Delete</a></div>
				</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

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

