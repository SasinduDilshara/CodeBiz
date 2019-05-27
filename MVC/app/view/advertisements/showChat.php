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
			$message = base64_decode($message);
			$chat=explode (" to :- ", $chat[0]);
			$to = $chat[1];
			$to = base64_decode($to);
			$from = substr($chat[0], 8);
			$from = base64_decode($from);
			if($to == currentUser()->username):?>
            <div class="btn btn-secondary" style=" margin: 3px;">
            <strong><?=$from?>:</strong> <?=$message?>
            </div> <br>
			<?php endif;
			if($from == currentUser()->username ):?>
			<div class="text-right">
				<div class="btn btn-info" style=" margin: 3px;">
					<?php if(currentUser()->userType=="Customer"): ?>
				<strong><?=$from?>:</strong> <?=$message?>
				<?php else: ?>
						<strong><?=$from?>:</strong> <?=$message?> <strong>@<?=$to?></strong>
				<?php endif; ?>
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
<?php if(currentUser()->userType == "Provider"): ?>
         <a href="<?=PROOT?>advertisements/showAccept/<?= $this->id ?>/<?= $this->type ?>" class="btn btn-secondary" > Back </a>
       <?php endif; ?>
<?php if(currentUser()->userType == "Customer"): ?>
		 <a href="<?=PROOT?>advertisements/ShowConfirmRequests" class="btn btn-secondary"> Back </a>

<?php endif; ?>

        </div>
	</div>
</div>


<?php $this->end() ?>