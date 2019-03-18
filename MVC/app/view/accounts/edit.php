<?php $this->setSiteTitle('Edit Contact'); ?>

<?php $this->start('head'); ?>
<script src="<?=PROOT.'/js/register_form_validate.js'?>"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container">
    <h3 class="text-center p-4"> Register  </h3>
        <form class="form" action="" method="post"> 
            <div class="form-row col">
                <div class="col">
                    <label for="fname">First name*</label><br>
                    <input type="text" name="fname" id="fname" required class="form-control"value="<?=currentUser()->fname ?>">
                </div>
                <div class="col">
                    <label for="lname">Last name</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="<?=currentUser()->lname ?>">
                </div>
            </div>
            <div class="col-6">
                <label for="email">Email*</label>
                <input type="text" name="email" id="email" class="form-control" required title="must be a valid email address"value="<?=currentUser()->email ?>">
            </div>
            <div class= "col-6">
                <label for="username">Username*</label>
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
                <label for="userType">User Type</label><br>
                <div class="form-row col">
                    <div class="col-3">
                        <input type="radio" name="userType" id="userType"   value="Provider" checked id="provider" onclick="disableCustomer();"> Provider
                    </div>
                    <div class="col-3">
                        <input type="radio" name="userType" id="userType"   value="Customer" id="customer"> Customer
                    </div>
                </div>
            </div>
            <div class="col">
                <label for="address">Address*</label>
                <input type="text" name="address" id="address" class="form-control" required title="must be a valid address"value="<?=currentUser()->address ?>">
            </div>
            <div class="col-6">
                <label for="phoneNumber">Contact Number</label>
                <input type="text" name="phoneNumber2" id="phoneNumber2" class="form-control" title="must be a valid Phone number"value="<?=currentUser()->phoneNumber2 ?>">
            </div>
            <div class="col">
                <label for="serviceType">Service Type</label><br>
                <div class="form-row col p-1">
                    <div class="col">
                        <input type="checkbox" name="serviceType[]" id="serviceType"   value="Washing" > Washing
                    </div>
                    <div class="col">
                        <input type="checkbox" name="serviceType[]" id="serviceType"   value="Cleaning"> Cleaning
                    </div>
                </div>
                <div class="form-row col p-1">
                    <div class="col">
                        <input type="checkbox" name="serviceType[]" id="serviceType"   value="Food"> Food
                    </div>
                    <div class="col">
                        <input type="checkbox" name="serviceType[]" id="serviceType"   value="Requests"> Allow Requests
                    </div>
                </div>
            </div>
            <div class="col">
                <label for="customerResidence">Customer Residence</label>
                <input type="text" name="customerResidence" id="customerResidence" class="form-control" required value="<?=currentUser()->customerResidence ?>">
            </div>
            <div><?=$this->displayErrors ?></div>
            <div class="text-center">
                <input type="submit" class="btn btn-danger btn-xs" value="Save" onclick="if(!confirm('Are you sure to Save changes ??>')){return false;}"><i class="glyphicon glyphicon-remove"></i>
            </div>
        <div class = "col-md-12 text-center">
        <a href="<?=PROOT?>" class="btn btn-default"> Cancel </a>
        </div>
    </form>
</div>
<?php $this->end(); ?>

