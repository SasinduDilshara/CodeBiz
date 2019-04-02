<?php $this->setSiteTitle('User Registration'); ?>

<?php $this->start('head'); ?>
<script src="<?=PROOT.'/js/register_form_validate.js'?>"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
    <div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:8rem; background-color: ;" >
        <div class="card-header" style="text-align: center">
            Register
        </div>
        <div class="card-body">
        <form class="form" action="" method="post"> 
            <div class="form-row col">
                <div class="col">
                    <label for="fname">First name*</label><br>
                    <input type="text" name="fname" id="fname" required class="form-control"value="<?=$this->post['fname'] ?>">
                </div>
                <div class="col">
                    <label for="lname">Last name</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="<?=$this->post['lname'] ?>">
                </div>
            </div>
            <div class="col-6">
                <label for="email">Email*</label>
                <input type="text" name="email" id="email" class="form-control" required title="must be a valid email address"value="<?=$this->post['email'] ?>">
            </div>
            <div class= "col-6">
                <label for="username">Username*</label>
                <input type="text" name="username" id="username" class="form-control" required value="<?=$this->post['username'] ?>">
            </div>
            <div class="form-row col">
                <div class="col">
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" class="form-control" required value="<?=$this->post['password'] ?>">
                </div>
                <div class="col">
                    <label for="confirm">Confirm Password*</label>
                    <input type="password" name="confirm" id="confirm" class="form-control" required value="<?=$this->post['confirm'] ?>">
                </div>
            </div>
            <!-- <div class="col">
                <label for="userType">User Type</label><br>
                <div class="form-row col">
                    <div class="col-3">
                        <input type="radio" name="userType" id="userType"   value="Provider" checked id="provider" onclick="disableCustomer();"> Provider
                    </div>
                    <div class="col-3">
                        <input type="radio" name="userType" id="userType"   value="Customer" id="customer"> Customer
                    </div>
                </div>
            </div> -->
<!--             <div class="col">
                <label for="userType">User Type</label><br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" name="userType" id="userType" autocomplete="off" checked value="Provider"> Provider
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="userType" id="userType" autocomplete="off" value="Customer"> Customer
                    </label>
                </div>
            </div> -->
            <div class="col">
                <label for="address">Address*</label>
                <input type="text" name="address" id="address" class="form-control" required title="must be a valid address"value="<?=$this->post['address'] ?>">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="phoneNumber">Contact Number</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+94</span>
                    </div>
                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" title="must be a valid Phone number"value="<?=$this->post['phoneNumber'] ?>">
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
                    <input type="text" name="phoneNumber2" id="phoneNumber2" class="form-control" title="must be a valid Phone number"value="<?=$this->post['phoneNumber2'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="area"> City </label>
                <input type="text" name="area" id="area" class="form-control" required title="must be a valid address" value="<?=$this->post['area'] ?>">
            </div>
            <div><?=$this->displayErrors ?></div>
            <div class="text-center">
                <input type="submit" class="btn btn-xs btn-primary" value="Register" >
            </div>
        <div class = "col-md-12 text-center">
        <a href="<?=PROOT?>" class="btn btn-default"> Cancel </a>
        </div>
    </form>
</div>
</div>
<script type="text/javascript">
    function disableCustomer(){
        //code to diasble
    }
</script>
<?php $this->end(); ?>