
<?php $this->setSiteTitle("Confirmed Advertisements"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;">Confirmed Advertisements</div>
<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
		<thead>
			<tr class="table-light">
			<th scope="col">Topic</th>
			<th scope="col">Description</th>
			<th scope="col">Location</th>
			<th scope="col">Type</th>
			<th scope="col">Service Provider</th>
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->advertisements as $advertisement): ?>
				<tr>
					<th scope="row">
						<a href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>"><?= $advertisement->topic; ?></a></th>
					<td><?= $advertisement->description; ?></td>
					<td><?= $advertisement->area; ?></td>
					<td><?= $advertisement->type;?></td>

					<?php if(currentUser()->userType == 'Customer' && currentUser()): ?>
						<?php $servicer = currentUser()->findById($advertisement->user_id) ?>
						<td>
							<a href="<?=PROOT?>accounts/details/<?=$advertisement->user_id?>"><?= $servicer->username ?>
						</td>
						<td>
						<?php if(!in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))):?>
							<a href="<?=PROOT?>advertisements/accept/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type ?>" > Accept </a>
						<?php endif; ?>
						<?php if(in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))):?>
							<a href="<?=PROOT?>advertisements/cancel/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type ?>" > Cancel </a>
						<?php endif; ?>
						</td>
						<td>
							<a href="<?=PROOT?>advertisements/askQuestion/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>/<?= $servicer->username ?>" > Message to Providers </a>
						</td>
						<td>
							<a href="<?=PROOT?>advertisements/showChat/<?=$advertisement->id?>/<?=$advertisement->type?>" > Show Chat </a>
						</td>
						<td>
						<?php if(!in_array((string)(currentUser()->id),explode (",", ($advertisement->ratedType)))): ?>
							<a href="<?=PROOT?>register/confirmedADD/<?=$servicer->id?>/<?=$advertisement->id?>/<?=$advertisement->type?>" > Rate <?= $servicer->username ?> and Finish</a>
						<?php endif; ?>
						<?php if(in_array((string)(currentUser()->id),explode (",", ($advertisement->ratedType)))): ?>
							<a   disabled> Rate <?= $servicer->username ?></a>
						<?php endif; ?>
						</td>
					<?php endif;?>

					<?php if(currentUser()->userType == 'Provider' && currentUser()):?>
						<?php $provider = $advertisement->confirmCustomerId ?>
						<?php $servicer = currentUser()->findById($advertisement->confirmCustomerId) ?>
						<td>
							<a 
							href="<?=PROOT?>advertisements/showAccept/<?=$advertisement->id?>/<?=$advertisement->type?>">
							servicer
						</td>
						<td>
						<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" > Cancel Confirmation </a></a>
						<td>
						<td>
							<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" > Message to Customers </a>
						</td>
						<td>
							<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" > Show Chats </a>
						</td>
						<td>
							<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" > Rate Customers </a>
						</td>
					<?php endif;?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php $this->end(); ?>

