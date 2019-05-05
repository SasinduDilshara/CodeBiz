<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 50rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Chat </div>
	<div class="card-body">
        <?php foreach($this->chat as $chatbar): 
			$chat = explode(" MESSAGE??: ", $chatbar);
			$message = $chat[1];
			$chat=explode (" to :- ", $chat[0]);
			$to = $chat[1];
			$from = substr($chat[0], 8);
			if($to == currentUser()->username || $from == currentUser()->username ):
			?>
        
            <div class="alert alert-info">
            <strong><?=$from?>:</strong> <?=$message?>
            </div>
			<?php endif; ?>  
        <?php endforeach; ?>

        <div class="form-group text-center">
            <a href="<?=PROOT?>advertisements/askQuestion/<?=$this->advertisement->id?>/<?=$this->advertisement->user_id?>/<?= $this->advertisement->type ?>" class="btn btn-primary"></i> Send Message </a>
            <a onclick="window.history.back();" class="btn btn-secondary" > Back </a>
        </div>
	</div>
</div>


<?php $this->end() ?>