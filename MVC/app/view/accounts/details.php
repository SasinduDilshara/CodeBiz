<?php $this->setSiteTitle($this->account->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	
	<h2 class="text-center"><?=$this->account->username?></h2>
	<div class="col-md-6">
		<p><strong><pre> Name :  </strong><?=$this->account->displayName()?></pre></p>
		<p><strong><pre> Email :  </strong><?=$this->account->email?></pre></p>
		<p><strong><pre> Contact :  </strong><?=$this->account->phoneNumber?></pre></p>
		<p><strong><pre> Area :  </strong><?=$this->account->area?></pre></p>
		<p><strong><pre> Address :  </strong><?=$this->account->displayAddress()?></pre></p>
		<p><strong><pre> Type of User :  </strong><?=$this->account->displayType()?></pre></p>
		<p><strong><pre> Rating :  </strong><?=$this->account->overallRating?></pre></p>
	</div>
	<div class="col-md-6">
		<?=$this->account->displayAddressLabel()?>
	</div>
<?php if(currentUser()->username == $this->account->username): ?>
	<a href="<?=PROOT?>accounts/edit" class="btn btn-xs btn-default"> Edit</a>
	<a href="<?=PROOT?>home" class="btn btn-xs btn-default"> Back</a>
<?php endif; ?>

</div>

<?php $this->end(); ?>

