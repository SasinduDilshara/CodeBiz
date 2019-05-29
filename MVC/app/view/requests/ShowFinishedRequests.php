
<?php $this->setSiteTitle("Finished Requests"); ?>
<?php $this->start('body'); ?>
<div id="title" class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;">Finished Requests</div>
<div id="table" class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
		<thead>
			<tr class="table-light">
			<th scope="col">Topic</th>
			<th scope="col">Description</th>
			<th scope="col">Location</th>
			<th scope="col">Service Provider</th>
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->requests as $request): ?>
				<tr>
					<td>
						<a href="<?=PROOT?>requests/details/<?=$request->id?>"><?= $request->service; ?></a>
					</td>
					<td><?= $request->description; ?></td>
					<td><?= $request->area; ?></td>
					<?php if(currentUser()->userType == 'Provider' && currentUser()): ?>
						<?php $servicer = currentUser()->findById($request->user_id) ?>
						<td>
							<a href="<?=PROOT?>accounts/details/<?=$request->user_id?>"><?= $servicer->username ?></a>
						</td>
						<!-- <td>
						<?php if(!in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
							<a href="<?=PROOT?>requests/accept/<?=$request->id?>/<?=$request->user_id?>" > Accept </a>
						<?php endif; ?>
						</td> -->
						<td>
							<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" > Message to Customer </a>
						</td>
						<td>
							<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" > Show Chat </a>
						</td>
						<td>
							<a href="<?=PROOT?>requests/UnmarkCompleted/<?=$request->id?>/<?=currentUser()->id ?>" > Mark as Not completed </a>
						</td>
						<td>
							<?php if(!(in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
							<a href="<?=PROOT?>register/confirmed/<?=$servicer->id?>/<?=$request->id?>" > Rate <?= $servicer->username ?></a>
						<?php endif; ?>
						<?php if((in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
							<a   disabled> Rate <?= $servicer->username ?></a>
						<?php endif; ?>
						</td>
					<?php endif;?>

					<?php if(currentUser()->userType == 'Customer' && currentUser()):?>

						<?php $provider = $request->completeId ?>
						<?php $servicer = currentUser()->findById($request->confirmProviderId) ?>
						<td>
							<a 
							href="<?=PROOT?>accounts/details/<?=$request->confirmProviderId?>">
							<?= $servicer->username ?>
						</td>
						<td>
							<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" > Message to Provider </a>
						</td>
						<td>
							<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" > Show Chat </a>
						</td>
						<td>
							<a href="<?=PROOT?>requests/UnmarkCompleted/<?=$request->id?>/<?=currentUser()->id ?>" > Mark as Not completed </a>
						</td>
						<td>
						<?php if(!(in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
							<a href="<?=PROOT?>register/confirmed/<?=$servicer->id?>/<?=$request->id?>" > Rate <?= $servicer->username ?></a>
						<?php endif; ?>
						<?php if((in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
							<a   disabled> Rate <?= $servicer->username ?></a>
						<?php endif; ?>
						</td>				
					<?php endif;?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php if(count($this->requests)==0): ?>
	<script type="text/javascript">
	document.getElementById("title").style.display = "none";
	document.getElementById("table").style.display = "none";
	</script>
	<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    	<button type="button" class="close" onclick="window.history.back();" ?>&times;</button>
		<div class="card-body">
        	<p class="mb-0"> No Requests yet </p>
		</div>
	</div>
<?php endif; ?>
<?php $this->end(); ?>

