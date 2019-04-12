<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<?php foreach($this->chat as $chatbar): ?>

<p> <?= $chatbar ?> </p>
<?php endforeach; ?>

<a href="<?=PROOT?>Requests/clearChat/<?=$this->request->id ?>" class="btn btn-xs btn-default" > Delete Chat </a>

<a href="<?=PROOT?>requests/askQuestion/<?=$this->request->id?>/<?=$this->request->user_id?>" class="btn btn-danger btn-xs"></i> Ask Doubts </a>

<a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-xs btn-default" > Back </a>


<?php $this->end() ?>