<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 50rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Chat </div>
	<div class="card-body">
        <?php foreach($this->chat as $chatbar): 
            $chatarr = explode(':',$chatbar);?>
        
            <div class="alert alert-info">
            <strong><?= $chatarr[0] ?>:</strong> <?= $chatarr[1] ?>
            </div>   
        <?php endforeach; ?>

        <div class="form-group text-center">
            <a href="<?=PROOT?>Requests/clearChat/<?=$this->request->id ?>" class="btn btn-danger" > Delete Chat </a>
            <a href="<?=PROOT?>requests/askQuestion/<?=$this->request->id?>/<?=$this->request->user_id?>" class="btn btn-primary"></i> Send Message </a>
            <a onclick="window.history.back();" class="btn btn-secondary" > Back </a>
        </div>
	</div>
</div>


<?php $this->end() ?>