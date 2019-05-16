<?php $this->setSiteTitle( 'Service Confirmed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Boarding Vibes </p>

<p> Your Confirmation was inform to the <?= $this->customer->username ?> </p>

<?php if(currentUser()->username == $this->owner->username): ?>
<a href="<?=PROOT?>advertisements/showAccept/<?=$this->advertisement->id ?>/<?=$this->advertisement->type?>" class="btn btn-xs btn-default"> Back</a>
<?php endif; ?>

<?php $this->end(); ?>