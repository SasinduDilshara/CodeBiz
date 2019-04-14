<?php $this->setSiteTitle( 'Cancel Request'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your Cancellation was inform to the <?= $this->owner->username ?> </p>


<a href="<?=PROOT?>advertisements/search?type=<?=$this->advertisement->type ?>&area=<?=$this->advertisement->area ?>" class="btn btn-xs btn-default"> Back</a>


<?php $this->end(); ?>