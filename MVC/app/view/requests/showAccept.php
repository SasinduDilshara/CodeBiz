<?php $this->setSiteTitle("Accepted Providers"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Accepted Providers </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Provider</th>
		<th> Date</th>
		<th> Time</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->providerslist as $provider): ?>

			<tr>

		<td>
		   <a   
			href="<?=PROOT?>accounts/details/<?=$provider->id?>">
					<?= $provider->username; ?>
			</a>
			</td>
				<td><?= $this->date ?></td>
				<td><?= $this->time ?></td>
				<td>
				<?php if($this->request->confirmProviderId == 0):?>
				<a href="<?=PROOT?>requests/confirm/<?=$this->request->id?>/<?=$provider->id?>" class="btn btn-danger btn-xs"></i> Confirm </a>
				<?php endif; ?>

				<?php if((($this->request->confirmProviderId != $provider->id) && ($this->request->confirmProviderId != 0)) ):?>
				<a disable class="btn btn-danger btn-xs"></i> Confirm </a>
				<?php endif; ?>
			</td>
				<?php if($this->request->confirmProviderId == $provider->id):?>

				<td>
					<?php if($this->request->completed == 0): ?>
				<a href="<?=PROOT?>requests/cancelConfirm/<?=$this->request->id?>/<?=$provider->id?>" class="btn btn-danger btn-xs"></i> Cancel Confirmation </a>
			<?php endif;?>
					<a href="<?=PROOT?>requests/askQuestion/<?=$this->request->id?>/<?=$this->request->user_id?>" class="btn btn-danger btn-xs"></i> Message to Provider </a>
					<a href="<?=PROOT?>requests/showChat/<?=$this->request->id?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>

				<?php endif; ?>


					
				</td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>






