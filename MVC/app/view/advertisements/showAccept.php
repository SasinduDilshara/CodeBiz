<?php $this->setSiteTitle("Accepted Customers"); ?>
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Accepted Customers </h1>
<table class="table table-striped table-condensed table-bordered">
	<thead>
		<th> Customer</th>
		<th> Date</th>
		<th> Time</th>
		<th></th>
	</thead>
	<body>
		<?php foreach($this->customerList as $customer): ?>

	<tr>

		<td>
		   <a   
			href="<?=PROOT?>accounts/details/<?=$customer->id?>">
					<?= $customer->username; ?>
			</a>
			</td>
				<td><?= $this->date ?></td>
				<td><?= $this->time ?></td>
				<td>
				<?php if(!in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))):?>
				<a href="<?=PROOT?>advertisements/confirm/<?=$this->advertisement->id?>/<?=$customer->id?>/<?=$this->advertisement->type?>" class="btn btn-danger btn-xs"></i> Accept </a>
				<?php endif; ?>

				<?php if(in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))) :?>
				<a href="<?=PROOT?>advertisements/cancelConfirm/<?=$this->advertisement->id?>/<?=$customer->id?>/<?=$this->advertisement->type?>" class="btn btn-danger btn-xs"></i> Cancel Acceptance </a>
				<?php endif; ?>
			</td>
				<?php if(in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))):?>

				<td>
					<a href="<?=PROOT?>advertisements/askQuestion/<?=$this->advertisement->id?>/<?=$this->advertisement->user_id?>/<?=$this->advertisement->type?>" class="btn btn-danger btn-xs"></i> Message to <?= $customer->username ?> </a>
					<a href="<?=PROOT?>advertisements/showChat/<?=$this->advertisement->id?>/<?=$this->advertisement->type?>" class="btn btn-danger btn-xs"></i> Show Chat </a>
				</td>

				<?php endif; ?>


					
				</td>
			</tr>

		<?php endforeach; ?>
	</body>
</table>
<?php $this->end(); ?>





