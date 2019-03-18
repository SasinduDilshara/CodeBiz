<?php $this->setSiteTitle("View Accounts"); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	
	<h2 class="text-center"><?=$this->account->username?></h2>
	<div class="col-md-6">
		<p><strong><pre> Name :  </strong><?=$this->account->displayName()?></pre></p>
		<p><strong><pre> Email :  </strong><?=$this->account->email?></pre></p>
		<p><strong><pre> Contact :  </strong><?=$this->account->phoneNumber2?></pre></p>
		<p><strong><pre> Address :  </strong><?=$this->account->displayAddress()?></pre></p>
		<p><strong><pre> Type of User :  </strong><?=$this->account->displayType()?></pre></p>
	</div>
	<div class="col-md-6">
		<?=$this->account->displayAddressLabel()?>
	</div>

	<a href="<?=PROOT?>accounts/edit/<?=$this->account->id?>" class="btn btn-xs btn-default"> Edit </a>

	<a href="<?=PROOT?>accounts/delete/<?=$this->account->id?>" class="btn btn-xs btn-default" > Delete Account </a>

	<a href="<?=PROOT?>home" class="btn btn-xs btn-default"> Back</a>



</div>

<?php $this->end(); ?>
