<?php $this->setSiteTitle( 'Request Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Confirmation was inform to the <?= $this->provider->username ?> </p>

<?php if(currentUser()->userType == 'Customer'): ?>
<a href="<?=PROOT?>requests/showAccept/<?=$this->request->id ?>" class="btn btn-xs btn-default"> Back</a>
<?php endif; ?>

<?php $this->end(); ?>