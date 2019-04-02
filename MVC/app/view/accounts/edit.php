<?php $this->setSiteTitle('Edit Contact'); ?>

<?php $this->start('head'); ?>
<script src="<?=PROOT.'/js/register_form_validate.js'?>"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container">
    <h3 class="text-center p-4"> Account  </h3>
        <form class="form" action="" method="post"> 
            <div class="form-row col">
                <div class="col">
                    <label for="fname">First name</label><br>
                    <input type="text" name="fname" id="fname" required class="form-control"value="<?=currentUser()->fname ?>">
                </div>
                <div class="col">
                    <label for="lname">Last name</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="<?=currentUser()->lname ?>">
                </div>
            </div>
            <div class="col-6">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" required title="must be a valid email address"value="<?=currentUser()->email ?>">
            </div>
            <div class= "col-6">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required value="<?=currentUser()->username ?>">
            </div>
            <div class="form-row col">
                <div class="col">
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" class="form-control" required value="<?=currentUser()->password ?>">
                </div>
                <div class="col">
                    <label for="confirm">Confirm Password*</label>
                    <input type="password" name="confirm" id="confirm" class="form-control" required value="<?=currentUser()->password ?>">
                </div>
            </div>

            <div class="col">
                <label for="address">Address*</label>
                <input type="text" name="address" id="address" class="form-control" required title="must be a valid address"value="<?=currentUser()->address ?>">
            </div>
            
            <div class="form-group col-6">
                <label class="control-label" for="phoneNumber">Contact Number</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+94</span>
                    </div>
                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" title="must be a valid Phone number"value="<?=currentUser()->phoneNumber?>">
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="phoneNumber2">Contact Number 2</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+94</span>
                    </div>
                    <input type="text" name="phoneNumber2" id="phoneNumber2" class="form-control" title="must be a valid Phone number"value="<?=currentUser()->phoneNumber2 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="area"> City </label>
                <input type="text" name="area" id="area" class="form-control" required title="must be a valid address" value="<?=currentUser()->area ?>">
            </div>
            <div><?=$this->displayErrors ?></div>
            <div class="text-center">
                <input type="submit" class="btn btn-xs btn-primary" value="Save" >
            </div>
        <div class = "col-md-12 text-center">
        <a href="<?=PROOT?>" class="btn btn-default"> Cancel </a>
        </div>
    </form>
</div>
<?php $this->end(); ?>

