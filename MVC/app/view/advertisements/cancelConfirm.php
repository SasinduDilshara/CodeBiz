<?php $this->setSiteTitle( 'Service Cancel'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Boarding Vibes </p>

<p> Your Cancellation was inform to the <?= $this->customer->username ?> </p>

<?php if(currentUser()->username == $this->owner->username): ?>
<a href="<?=PROOT?>advertisements/showAccept/<?=$this->advertisement->id ?>/<?=$this->advertisement->type?>" class="btn btn-xs btn-default"> Back</a>
<?php endif; ?>

<?php $this->end(); ?>