<?php $this->setSiteTitle("Accepted Providers"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Results </h1>
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
				<?php if($this->request->confirmProviderId != $provider->id):?>
				<a href="<?=PROOT?>requests/confirm/<?=$this->request->id?>/<?=$provider->id?>" class="btn btn-danger btn-xs"></i> Confirm </a>
				<?php endif; ?>
				<?php if($this->request->confirmProviderId == $provider->id):?>
				<a href="<?=PROOT?>requests/cancelConfirm/<?=$this->request->id?>/<?=$provider->id?>" class="btn btn-danger btn-xs"></i> Cancel Confirmation </a>
				<?php endif; ?>


					
				</td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>