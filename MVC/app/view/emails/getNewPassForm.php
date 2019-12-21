<?php $this->setSiteTitle( 'Forget Password'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>














<div class = "card border-primary mb-3" style="max-width: 40rem; margin:auto; top:5rem;">
    <div class="card-header" style="text-align: center">Change Password</div>
    <div class="card-body">
        <form class="form" action='<?=PROOT?>emails/getNewPassword/<?=$this->id?>/<?=$this->pi?>' method="post"> 
        <div><?=$this->displayErrors?></div>
        <div class="form-group">
            <div class="col">
                <label for="password">New Password*</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="col">
                <label for="confirm">Confirm New Password*</label>
                <input type="password" name="confirm" id="confirm" class="form-control" required>
            </div>
        </div>
        
        <div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value="Save" >
        </div>
        <div class = "col-md-12 text-center">
        <a href="<?=PROOT?>" class="btn btn-default"> Cancel </a>
    </form>
</div>





















<?php $this->end(); ?>
