
<?php $this->setSiteTitle("Confirmed Advertisements"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Confirmed Requests </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Topic</th>
		<th> Location</th>
		<th> Servicer </th>
		<th></th>
	</thead>
	<body>
<?php foreach($this->advertisements as $advertisement): ?>
			<tr>
				<td>
					<a 
					href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>">

					<?= $advertisement->topic; ?>
					</a>
				</td>
				<td>
					<?= $advertisement->area; ?>
						
				</td>


<?php if(currentUser()->userType == 'Customer' && currentUser()): ?>
				
					<?php $servicer = currentUser()->findById($advertisement->user_id) ?>
				<td>
					<a 
					href="<?=PROOT?>accounts/details/<?=$advertisement->user_id?>">
					<?= $servicer->username ?>
				</td>
				<td>
				<?php if(!in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))):?>
				<a href="<?=PROOT?>advertisements/accept/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type ?>" class="btn btn-danger btn-xs"></i> Accept </a>
				<?php endif; ?>

				<?php if(in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))):?>
				<a href="<?=PROOT?>advertisements/cancel/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type ?>" class="btn btn-danger btn-xs"></i> Cancel </a>
				<?php endif; ?>
			
				<td>
					<a href="<?=PROOT?>advertisements/askQuestion/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>/<?= $servicer->username ?>" class="btn btn-danger btn-xs"></i> Message to Providers </a>
				</td>
				<td>
					<a href="<?=PROOT?>advertisements/showChat/<?=$advertisement->id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>

							<td>
					<?php if(!in_array((string)(currentUser()->id),explode (",", ($advertisement->ratedType)))): ?>
					<a href="<?=PROOT?>register/confirmedADD/<?=$servicer->id?>/<?=$advertisement->id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"> Rate <?= $servicer->username ?> and Finish</a>
				<?php endif; ?>
				<?php      if(in_array((string)(currentUser()->id),explode (",", ($advertisement->ratedType)))): ?>
					<a  class="btn btn-danger btn-xs" disabled> Rate <?= $servicer->username ?></a>
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
				<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Cancel Confirmation </a></a>
				<td>
				<td>
					<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Message to Customers </a>
				</td>
				<td>
					<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Show Chats </a>
				</td>
			<td>
					<a href="<?=PROOT?>advertisements/showAcceptd/<?=$advertisement->id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Rate Customers </a>
				</td>

	<?php endif;?>


			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

