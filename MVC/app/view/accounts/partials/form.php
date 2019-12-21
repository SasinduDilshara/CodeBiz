<?php $this->setSiteTitle('User Registration'); ?>

<?php $this->start('head'); ?>
<script src="<?=PROOT.'/js/register_form_validate.js'?>"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-3 col-md-offset-3 well">
    <h3 class="text-center"> Register  </h3>

        <form class="form" action="" method="post"> 
        <div><?=$this->displayErrors ?></div>
        <div class="form-group">
            <div>
                <label for="fname"><h4>First name</h4></label><br>
                <input 
                type="text" 
                name="fname" 
                id="fname" 
                required
                class="form-control"
                value="<?=$this->$account->fname ?>">
            </div>
            <div>
                <label for="lname"><h4>Last name</h4></label>
                <input 
                type="text" 
                name="lname" 
                id="lname" 
                class="form-control" 
                value="<?=$this->post['lname'] ?>">
            </div>

            <div>
                <label for="email"><h4>Email</h4></label>
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
                <label for="username"><h4>Username</h4></label>
                <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control" 
                required
                value="<?=$this->post['username'] ?>">
            </div>
            <div>
                <label for="password"><h4>Password</h4></label>
                <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control" 
                required
                value="<?=$this->post['password'] ?>">
            </div>
            <div>
                <label for="confirm"><h4>Confirm Password</h4></label>
                <input 
                type="password" 
                name="confirm" 
                id="confirm" 
                class="form-control" 
                required
                value="<?=$this->post['confirm'] ?>">
            </div>
            <div>
                <label for="address"><h4>Address</h4></label>
                <input 
                type="text" 
                name="address" 
                id="address" 
                class="form-control" 
                required
                title="must be a valid address"
                value="<?=$this->post['address'] ?>">
            </div>

            <div>
                <label for="phoneNumber"><h4>Contact Number 2</h4></label>
                <input 
                type="text" 
                name="phoneNumber2" 
                id="phoneNumber2" 
                class="form-control" 
                title="must be a valid Phone number"
                value="<?=$this->post['phoneNumber2'] ?>">
            </div>
            <div>
                <label for="serviceType"><h4>Service Type</h4></label><br>
                  <input type="checkbox" name="serviceType[]" id="serviceType"   value="Washing" > Washing<br>
                  <input type="checkbox" name="serviceType[]" id="serviceType"   value="Cleaning"> Cleaning<br>
                  <input type="checkbox" name="serviceType[]" id="serviceType"   value="Food"> Food<br>
                  <input type="checkbox" name="serviceType[]" id="serviceType"   value="Requests"> Allow Requests<br>

            </div>
            <div>
                <label for="userType"><h4>User type</h4></label><br>
                  <input type="radio" name="userType" id="userType"   value="Provider" checked> Provider<br>
                  <input type="radio" name="userType" id="userType"   value="Customer"> Customer<br>
                  <input type="radio" name="userType" id="userType"   value="Both"> Both Provider and Customer<br>
            </div>
            <div>
                <label for="customerResidence"><h4>Customer Residence</h4></label>
                <input 
                type="text" 
                name="customerResidence" 
                id="customerResidence" 
                class="form-control" 
                required
                value="<?=$this->post['customerResidence'] ?>">
            </div>

        </div>
        
        <div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value="register" >
        </div>
        <div class = "col-md-12 text-center">
        <a href="<?=PROOT?>" class="btn btn-default"> Cancel </a>
    </form>
</div>
<?php $this->end(); ?>