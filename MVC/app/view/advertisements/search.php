<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Search Results </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> topic</th>
		<th> Description</th>
<!-- 		<th> Description</th> -->
		<th> Location</th>
		<th>Type</th>
		<th>Provider</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->advertisements as $advertisement): ?>
			<?php if(currentUser()): ?>
			<?php $customer = currentUser()->findById((int)($advertisement->user_id)) ?>
			<?php endif; ?>
			<?php if(!currentUser() || $customer->username != currentUser()->username): ?>
			<tr>

				<td>
					<a 
			href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>">
					<?= $advertisement->topic; ?>
				</a>
			</td>

				<td><?= $advertisement->description; ?></td>	
				<td><?= $advertisement->area; ?></td>
				<td> <?= $advertisement->type;?> </td>
				<td><a   
			href="<?=PROOT?>accounts/details/<?=$advertisement->user_id?>">
			<?php if(!currentUser()): ?>
			Service Providerdetails
		<?php endif; ?>
			<?php if(currentUser()): ?>
					<?= $customer->username; ?>
			<?php endif; ?>
			</a>
		</td>	
			
			<td>

				<?php if(!currentUser() ):?>
				<a href="<?=PROOT?>advertisements/accept/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Want Service </a>
				

				 <?php elseif(!in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId)) ):?>
				<a href="<?=PROOT?>advertisements/accept/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Want Service </a>
				
				<?php elseif(in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))) :?>
				<a href="<?=PROOT?>advertisements/cancel/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>" class="btn btn-danger btn-xs"></i> Cancel Service </a>
				<?php endif; ?>
			</td>
			<td>
			<?php if(currentUser() && in_array((string)(currentUser()->id),explode(",",$advertisement->confirmCustomerId))):?>
			<!-- <td> -->
					<a href="<?=PROOT?>advertisements/showChat/<?=$advertisement->id?>/<?= $advertisement->type?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				<!-- </td> -->
			<?php endif; ?>
		</td>
			</tr>
		<?php endif; ?>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>