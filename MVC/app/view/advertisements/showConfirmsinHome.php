
<?php $this->setSiteTitle("Confirmed Advertisements"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:3rem;padding-top:5rem;text-shadow: 3px 4px 5px #000;">Confirmed Advertisements</div>
<div style="display: flex;flex-wrap: wrap;margin:auto;top:3rem;max-width:95%">
	<?php foreach($this->advertisements as $advertisement): ?>
		<div class="card border-primary mb-3" style="max-width:690px;margin:12px;width:100%">
			<div class="card-body">
				<div class="d-flex">
					<div class="p-2">
					<?php if($advertisement->type=="Cleaning"): ?>
						<div style="background: url(<?=PROOT?>img/upload/<?= $advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/cleaning.jpg);
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					<?php elseif($advertisement->type=="Catering"): ?>
						<div style="background: url(<?=PROOT?>img/upload/<?= $advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/cooking.jpg);
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					<?php elseif($advertisement->type=="Laundering"): ?>
						<div style="background: url(<?=PROOT?>img/upload/<?= $advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/laundry.jpg);
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					<?php endif; ?>
					</div>
					<div class="align-self-start">
					<a href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>"><h4><?= $advertisement->topic ?></h4></a>
					<p class="card-text"><h5><?= $advertisement->description ?></h5></p>
					<p class="card-text"><strong>Type : </strong><?= $advertisement->type ?></p>
					<p class="card-text"><strong>Area : </strong><?= $advertisement->area ?></p>
					<?php if(currentUser()->userType == 'Customer' && currentUser()): ?>
						<?php $servicer = currentUser()->findById($advertisement->user_id) ?>
						<p class="card-text"><strong>Servicer : </strong><a href="<?=PROOT?>accounts/details/<?=$advertisement->user_id?>"><?= $servicer->username ?></p>
					<?php endif ?>
					<?php if(currentUser()->userType == 'Provider' && currentUser()):?>
						<?php $provider = $advertisement->confirmCustomerId ?>
						<?php $servicer = currentUser()->findById($advertisement->confirmCustomerId) ?>
						<p class="card-text"><strong>Accepted by : </strong><a href="<?=PROOT?>accounts/details/<?=$advertisement->confirmCustomerId?>"><?= $servicer->username ?> </a></p>
					<?php endif; ?>
				</div>
				</div>
				<?php if(currentUser()->userType == 'Customer' && currentUser()): ?>
				<div class="d-flex">
					<div class="p-2">
						<?php if(!in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))):?>
							<a class="btn btn-outline-primary" href="<?=PROOT?>advertisements/accept/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type ?>" > Accept </a>
						<?php endif; ?>
						<?php if(in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))):?>
							<a class="btn btn-outline-danger" href="<?=PROOT?>advertisements/cancel/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type ?>" > Cancel Confirmation</a>
						<?php endif; ?>
					</div>
					<div class="p-2">
						<a class="btn btn-outline-primary" href="<?=PROOT?>advertisements/askQuestion/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>/<?= $servicer->username ?>" > Message to Providers </a>
					</div>
					<div class="p-2">
					<a class="btn btn-outline-primary" href="<?=PROOT?>advertisements/showChat/<?=$advertisement->id?>/<?=$advertisement->type?>" > Show Chat </a>
					</div>
					<div class="p-2">
					<?php if(!in_array((string)(currentUser()->id),explode (",", ($advertisement->ratedType)))): ?>
						<a class="btn btn-outline-secondary" href="<?=PROOT?>register/confirmedADD/<?=$servicer->id?>/<?=$advertisement->id?>/<?=$advertisement->type?>" > Rate <?= $servicer->username ?></a>
					<?php endif; ?>
					<?php if(in_array((string)(currentUser()->id),explode (",", ($advertisement->ratedType)))): ?>
						<button class="btn btn-secondary" disabled>Rated</button>
					<?php endif; ?>
					</div>
				</div>			
				<?php endif;?>
				<?php if(currentUser()->userType == 'Provider' && currentUser()):?>
				<div class="d-flex">
					<div class="mr-auto p-2">
						<a class="btn btn-outline-primary" href="<?=PROOT?>advertisements/showAccept/<?=$advertisement->id ?>/<?=$advertisement->type?>"> Show Acceptences </a>	
					</div>
					<div class="p-2">
						<a class="btn btn-outline-danger" href="<?=PROOT?>advertisements/cancelConfirm/<?=$advertisement->id?>/<?=$advertisement->confirmCustomerId?>/<?=$advertisement->type?>" > Cancel Confirmation</a>
					</div>	
				</div>
				<?php endif;?></div></div>
	<?php endforeach; ?>
	</div>
<?php $this->end(); ?>

