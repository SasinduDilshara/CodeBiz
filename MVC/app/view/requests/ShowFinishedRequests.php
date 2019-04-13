
<?php $this->setSiteTitle("Finished Requests"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Finished Requests </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Service</th>
		<th> Description</th>
		<th> Servicer </th>
		<th></th>
	</thead>
	<body>
<?php foreach($this->requests as $request): ?>

			<tr>
				<td>
					<a 
					href="<?=PROOT?>requests/details/<?=$request->id?>">

					<?= $request->service; ?>
					</a>
				</td>
				<td>
					<?= $request->description; ?>
						
				</td>


<?php if(currentUser()->userType == 'Provider' && currentUser()): ?>
				
					<?php $servicer = currentUser()->findById($request->user_id) ?>
				<td>
					<a 

					href="<?=PROOT?>accounts/details/<?=$request->user_id?>">
					<?= $servicer->username ?>
				</td>
				<td>
				<?php if(!in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
				<a href="<?=PROOT?>requests/accept/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Accept </a>
				<?php endif; ?>
			
				<td>
					<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Message to Customer </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/UnmarkCompleted/<?=$request->id?>/<?=currentUser()->id ?>" class="btn btn-danger btn-xs"></i> Mark as Not completed </a>
				</td>
				<td>
					<?php if(!(in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
					<a href="<?=PROOT?>register/confirmed/<?=$servicer->id?>/<?=$request->id?>" class="btn btn-danger btn-xs"> Rate <?= $servicer->username ?></a>
				<?php endif; ?>
				<?php if((in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
					<a  class="btn btn-danger btn-xs" disabled> Rate <?= $servicer->username ?></a>
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
					<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Message to Provider </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/UnmarkCompleted/<?=$request->id?>/<?=currentUser()->id ?>" class="btn btn-danger btn-xs"></i> Mark as Not completed </a>
				</td>
				<td>
					<?php if(!(in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
					<a href="<?=PROOT?>register/confirmed/<?=$servicer->id?>/<?=$request->id?>" class="btn btn-danger btn-xs"> Rate <?= $servicer->username ?></a>
				<?php endif; ?>
				<?php if((in_array(currentUser()->userType,explode (",", ($request->ratedType))))): ?>
					<a  class="btn btn-danger btn-xs" disabled> Rate <?= $servicer->username ?></a>
				<?php endif; ?>
				</td>
				
	<?php endif;?>


			</tr>
			
		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

