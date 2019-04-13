
<?php $this->setSiteTitle("Confirmed Requests"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Confirmed Requests </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Service</th>
		<th> Description</th>
		<th> Servicer </th>
		<th></th>
	</thead>
	<body>
<?php foreach($this->requests as $request): ?>
		<?php if($request->confirmProviderId != 0 && $request->completed!=1):?>
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

				<?php if(in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
				<a href="<?=PROOT?>requests/cancel/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Cancel </a>
				<?php endif; ?>
			
				<td>
					<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Message to Customer </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/markCompleted/<?=$request->id?>/<?=currentUser()->id ?>" class="btn btn-danger btn-xs"></i> Mark as completed </a>
				</td>
<?php endif;?>

<?php if(currentUser()->userType == 'Customer' && currentUser()):?>

		<?php $provider = $request->confirmProviderId ?>
		<?php $servicer = currentUser()->findById($request->confirmProviderId) ?>
				<td>
					<a 
					href="<?=PROOT?>accounts/details/<?=$request->confirmProviderId?>">
					<?= $servicer->username ?>
				</td>
				<td>
				<a href="<?=PROOT?>requests/cancelConfirm/<?=$request->id?>/<?=$provider?>" class="btn btn-danger btn-xs"></i> Cancel Confirmation </a></a>
				<td>
				<td>
					<a href="<?=PROOT?>requests/askQuestion/<?=$request->id?>/<?=$request->user_id?>" class="btn btn-danger btn-xs"></i> Message to Provider </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>
				<td>
					<a href="<?=PROOT?>requests/markCompleted/<?=$request->id?>/<?=currentUser()->id ?>" class="btn btn-danger btn-xs"></i> Mark as completed </a>
				</td>

	<?php endif;?>


			</tr>
			<?php endif;?>
		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>

