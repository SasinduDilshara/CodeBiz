<?php $this->setSiteTitle( 'Request Accepted'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Boarding Vibes </p>

<p> Your Acceptence was inform to the <?= $this->owner->username ?> </p>

<a href="<?=PROOT?>advertisements/search?type=<?=$this->advertisement->type ?>&area=<?=$this->advertisement->area ?>" class="btn btn-xs btn-default"> Back</a>

<?php $this->end(); ?>