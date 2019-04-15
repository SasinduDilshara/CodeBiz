<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<?php foreach($this->chat as $chatbar): ?>


<?php
$chat=explode (" MESSAGE??: ", $chatbar);

$message = $chat[1];

 $chat=explode (" to :- ", $chat[0]);
$to = $chat[1];
$from = substr($chat[0], 8);
// dnd($from);
if($to == currentUser()->username || $from == currentUser()->username ):  ?>

<p>
	<?=$from?> : <?=$message?>
</p>

<?php endif; ?>

<?php endforeach; ?>


<a href="<?=PROOT?>advertisements/askQuestion/<?=$this->advertisement->id?>/<?=$this->advertisement->user_id?>/<?= $this->advertisement->type ?>" class="btn btn-danger btn-xs"></i> Ask Doubts </a>

<a href="<?=PROOT?>advertisements/ShowConfirmRequests" class="btn btn-xs btn-default" > Back </a>


<?php $this->end() ?>