<?php $this->setSiteTitle('User Registration'); ?>

<?php $this->start('head'); ?>
<script src="<?=PROOT.'/js/register_form_validate.js'?>"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
    <h3 class="text-center"> Register  </h3>

        <form class="form" action="" method="post"> 
        <div><?=$this->displayErrors ?></div>
        <div class="form-group">
            <div>
                <label for="fname">First name</label>
                <input 
                type="text" 
                name="fname" 
                id="fname" 
                required
                class="form-control"
                value="<?=$this->post['fname'] ?>">
            </div>
            <div>
                <label for="lname">Last name</label>
                <input 
                type="text" 
                name="lname" 
                id="lname" 
                class="form-control" 
                value="<?=$this->post['lname'] ?>">
            </div>

            <div>
                <label for="email">Email</label>
                <input 
                type="text" 
                name="email" 
                id="email" 
                class="form-control" 
                required
                title="must be a valid email address"
                value="<?=$this->post['email'] ?>">
            </div>

            <div>
                <label for="username">Username</label>
                <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control" 
                required
                value="<?=$this->post['username'] ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control" 
                required
                value="<?=$this->post['password'] ?>">
            </div>
            <div>
                <label for="confirm">Confirm Password</label>
                <input 
                type="password" 
                name="confirm" 
                id="confirm" 
                class="form-control" 
                required
                value="<?=$this->post['confirm'] ?>">
            </div>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-large btn-primary" value="register" >
        </div>
    </form>
</div>
<?php $this->end(); ?>