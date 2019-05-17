<?php $this->setSiteTitle("Accepted Customers"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;">Accepted Customers - <?=$this->advertisement->topic?></div>

<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
	<thead>
		<th> Customer</th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach($this->customerList as $customer): ?>
			<tr>

				<td>
				<a href="<?=PROOT?>accounts/details/<?=$customer->id?>"><?= $customer->username; ?></a>
				</td>
				<td>
					<?php if(!in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))):?>
						<a href="<?=PROOT?>advertisements/confirm/<?=$this->advertisement->id?>/<?=$customer->id?>/<?=$this->advertisement->type?>" > Accept </a>
					<?php endif; ?>
					<?php if(in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))) :?>
						<a href="<?=PROOT?>advertisements/cancelConfirm/<?=$this->advertisement->id?>/<?=$customer->id?>/<?=$this->advertisement->type?>" > Cancel Acceptance </a>
					<?php endif; ?>
				</td>
				<td>
					<?php if(!in_array($customer->username,explode(",",$this->advertisement->ratedType)) && in_array((string)($customer->id),explode(",",$this->advertisement->confirmCustomerId))): ?>
						<a href="<?=PROOT?>register/confirmedADD/<?=$customer->id?>/<?=$this->advertisement->id?>/<?=$this->advertisement->type?>" class=""> Rate <?= $customer->username ?> and Finish</a>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>
					
<?php $this->end(); ?>







