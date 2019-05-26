<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 40rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Chat </div>
	<div class="card-body">
	<?php if($this->chat):?>
        <?php foreach($this->chat as $chatbar): 
			$chat = explode(" MESSAGE??: ", $chatbar);
			$message = $chat[1];
			$chat=explode (" to :- ", $chat[0]);
			$to = $chat[1];
			$from = substr($chat[0], 8);
			if($to == currentUser()->username):?>
            <div class="btn btn-secondary" style=" margin: 3px;">
            <strong><?=$from?>:</strong> <?=$message?>
            </div> <br>
			<?php endif;
			if($from == currentUser()->username ):?>
			<div class="text-right">
				<div class="btn btn-info" style=" margin: 3px;">
				<strong><?=$from?>:</strong> <?=$message?>
				</div> <br>
			</div>  
			<?php endif; ?> 
        <?php endforeach; ?>
	<?php else: ?>
		<div style="text-align: center"> Chat is empty</div>
	<?php endif; ?>
		<br>
        <div class="form-group text-center">
            <a href="<?=PROOT?>advertisements/askQuestion/<?=$this->advertisement->id?>/<?=$this->advertisement->user_id?>/<?= $this->advertisement->type ?>" class="btn btn-primary"></i> Send Message </a>
            <a onclick="window.history.back();" class="btn btn-secondary" > Back </a>
        </div>
	</div>
</div>


<?php $this->end() ?>