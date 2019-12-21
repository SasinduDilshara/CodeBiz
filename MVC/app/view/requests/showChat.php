<?php $this->setSiteTitle('Chat'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<!-- <div class="card-header" style="text-align: center"> Chat </div> -->
	<div class="card-body" style="background-color:#001128">
    <div style="background:url(<?=PROOT?>img/chat.jpg) 50% 50% no-repeat;height: 30rem;overflow: auto;">
    <?php if($this->chat):?>
        <?php foreach($this->chat as $chatbar):

            $chatarr = explode(':',$chatbar);
            // dnd($chatarr); 
            ?>
            <?php if($chatarr[0] == (currentUser()->username)." "): ?>
            <div class="text-right">
				<div class="btn btn-info" style=" margin: 3px;">
                    <?= base64_decode($chatarr[1]) ?>
                </div>
            </div>
            <?php elseif($chatarr[0] != (currentUser()->username)." "): ?>
            <div class="text-left">
                <div class="btn btn-primary" style=" margin: 3px;">
                    <strong><?= $chatarr[0] ?> : </strong> <?= base64_decode($chatarr[1]) ?>
                </div>
            </div>
            <?php endif; ?>
            <!-- </div>    -->
        <?php endforeach; ?>
    <?php else: ?>
        <div style="text-align: center"> Chat is empty</div>
    <?php endif; ?>
    </div>
        <br>
        <div class="form-group text-center" style="margin-bottom: 0px;">
            <a href="<?=PROOT?>Requests/clearChat/<?=$this->request->id ?>" class="btn btn-danger" > Delete Chat </a>
            <a href="<?=PROOT?>requests/askQuestion/<?=$this->request->id?>/<?=$this->request->user_id?>" class="btn btn-primary"></i> Send Message </a>
            <?php if(currentUser()->userType == "Provider"): ?>
         <a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-secondary" > Back </a>
       <?php endif; ?>
<?php if(currentUser()->userType == "Customer"): ?>
         <a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-secondary"> Back </a>
        </div>
        <?php endif; ?>
	</div>
</div>


<?php $this->end() ?>