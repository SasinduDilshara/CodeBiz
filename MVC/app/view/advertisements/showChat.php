<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<?php foreach($this->chat as $chatbar): ?>

<p> <?= $chatbar ?> </p>
<?php endforeach; ?>

<!-- <a href="<?=PROOT?>advertisements/clearChat/<?=$this->advertisement->id ?>/<?= $this->advertisement->type ?>" class="btn btn-xs btn-default" > Delete Chat </a> -->

<a href="<?=PROOT?>advertisements/askQuestion/<?=$this->advertisement->id?>/<?=$this->advertisement->user_id?>/<?= $this->advertisement->type ?>" class="btn btn-danger btn-xs"></i> Ask Doubts </a>

<a href="<?=PROOT?>advertisements/ShowConfirmRequests" class="btn btn-xs btn-default" > Back </a>


<?php $this->end() ?>