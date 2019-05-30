<?php $this->setSiteTitle("Accepted Customers"); ?>
<?php $this->start('body'); ?>
<div id="title" class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;text-shadow: 3px 4px 5px #000;"><?=$this->advertisement->topic?></div>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto;">
	<table class="table table-hover">
	<thead>
		<?php foreach($this->customerList as $customer): ?>
			<tr>

				<td>
				<a href="<?=PROOT?>accounts/details/<?=$customer->id?>"><?= $customer->username; ?></a>
				</td>
				<td>
					<?php if(!in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))):?>
						<a class="btn btn-outline-primary" href="<?=PROOT?>advertisements/confirm/<?=$this->advertisement->id?>/<?=$customer->id?>/<?=$this->advertisement->type?>" > Accept </a>
					<?php endif; ?>
					<?php if(in_array((string)($customer->id),explode(",",($this->advertisement->confirmCustomerId)))) :?>
						<a class="btn btn-outline-primary" href="<?=PROOT?>advertisements/cancelConfirm/<?=$this->advertisement->id?>/<?=$customer->id?>/<?=$this->advertisement->type?>" > Cancel Acceptance </a>
					<?php endif; ?>
				</td>
				<td>
					<?php if(!in_array($customer->username,explode(",",$this->advertisement->ratedType)) && in_array((string)($customer->id),explode(",",$this->advertisement->confirmCustomerId))): ?>
						<a class="btn btn-outline-secondary" href="<?=PROOT?>register/confirmedADD/<?=$customer->id?>/<?=$this->advertisement->id?>/<?=$this->advertisement->type?>" class=""> Rate <?= $customer->username ?> and Finish</a>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</thead>
	</table>
</div>
<div class="text-center">
<a href="<?=PROOT?>advertisements/askQuestion/<?=$this->advertisement->id?>/<?=$this->advertisement->user_id?>/<?=$this->advertisement->type?>/<?= $customer->username ?>" class="btn btn-primary"></i> Message to customers  </a>
<a href="<?=PROOT?>advertisements/showChat/<?=$this->advertisement->id?>/<?=$this->advertisement->type?>" class="btn btn-primary"></i> Show Chat </a>
<a href="javascript:history.back()" class="btn btn-secondary"></i> Back </a>		
</div>
			
<?php $this->end(); ?>







