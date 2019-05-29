
<?php $this->setSiteTitle("Confirmed Requests"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:3rem;padding-top:5rem;text-shadow: 3px 4px 5px #000;">Confirmed Requests</div>
<div style="display: flex;flex-wrap: wrap;margin:auto;top:3rem;max-width:95%">
	<?php $x=0;
	foreach($this->requests as $request): ?>
		<?php if($request->confirmProviderId != 0 && $request->completed!=1):
			$x +=1;?>
		<div class="card border-primary mb-3" style="max-width:690px;margin:12px;width:100%">
			<div class="card-body">
				<div class="d-flex">
					<div class="p-2">
						<div style="
							background: url(<?=PROOT?>img/requests.png) 50% 50% no-repeat;
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					</div>
					<div class="p-2">
						<p class="card-text"><a href="<?=PROOT?>requests/details/<?=$request->id?>"><h5><?= $request->service; ?></h5></a></p>
						<p class="card-text"><?= $request->description; ?></p>
						<p class="card-text"><strong>Area : </strong><?= $request->area; ?></p>		
					<?php if(currentUser()->userType == 'Provider' && currentUser()): ?>
						<?php $servicer = currentUser()->findById($request->user_id) ?>
						<p class="card-text"><strong>Servicer : </strong><a href="<?=PROOT?>accounts/details/<?=$request->user_id?>"><?= $servicer->username ?></a> </p>		
					</div>
				</div>
				<div class="d-flex">
					<div class="p-2">
						<?php if(!in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
						<a class="btn btn-outline-danger" href="<?=PROOT?>requests/accept/<?=$request->id?>/<?=$request->user_id?>" > Accept </a>
						<?php endif; ?>
						<?php if(in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
						<a class="btn btn-outline-danger" href="<?=PROOT?>requests/cancel/<?=$request->id?>/<?=$request->user_id?>" > Cancel </a>
						<?php endif; ?>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-primary" href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" > Message to Customer </a>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-primary" href="<?=PROOT?>requests/showChat/<?=$request->id?>" > Show Chat </a>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-secondary" href="<?=PROOT?>requests/markCompleted/<?=$request->id?>/<?=currentUser()->id ?>" > Mark as completed </a>
					</div>
					<?php endif;?>
					<?php if(currentUser()->userType == 'Customer' && currentUser()):?>
						<?php $provider = $request->confirmProviderId ?>
						<?php $servicer = currentUser()->findById($request->confirmProviderId) ?>
						<p><a href="<?=PROOT?>accounts/details/<?=$request->confirmProviderId?>"><?= $servicer->username ?></a></p>	
					</div>
				</div>
				<div class="d-flex">
					<div class="p-2">
						<a class="btn btn-outline-danger" href="<?=PROOT?>requests/cancelConfirm/<?=$request->id?>/<?=$provider?>" > Cancel Confirmation </a></a>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-primary" href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" > Message to Provider </a>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-primary" href="<?=PROOT?>requests/showChat/<?=$request->id?>" > Show Chat </a>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-secondary" href="<?=PROOT?>requests/markCompleted/<?=$request->id?>/<?=currentUser()->id ?>" > Mark as completed </a>	
					</div>
						<?php endif;?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<?php if($x==0): ?>
	<script type="text/javascript">document.getElementById("title").style.display = "none";</script>
	<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    	<button type="button" class="close" onclick="window.location='<?=PROOT?>';" ?>&times;</button>
		<div class="card-body">
        	<p class="mb-0"> No Confirmed Requests yet </p>
		</div>
	</div>
<?php endif; ?>
<?php $this->end(); ?>

