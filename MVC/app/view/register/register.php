<?php $this->setSiteTitle('User Registration'); ?>

<?php $this->start('head'); ?>
<script src="<?=PROOT.'/js/register_form_validate.js'?>"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
    <div class = "card border-primary mb-3" style="max-width: 50rem; margin:auto; top:5rem;" >
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
            <div class="col" style = "padding-right: 25px;">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" title="must be a valid address"value="<?=$this->post['address'] ?>">
            </div>

            <div class="form-row col">
                <div class="col">
                <label class="control-label" for="phoneNumber">Contact Number</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+94</span>
                        </div>
                        <input type="text" name="phoneNumber" id="phoneNumber" maxlength="9" class="form-control" title="must be a valid Phone number"value="<?=$this->post['phoneNumber'] ?>">
                    </div>
                </div>
                <div class="col">
                <label class="control-label" for="phoneNumber2">Contact Number 2</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+94</span>
                        </div>
                         <input type="text" name="phoneNumber2" id="phoneNumber2" maxlength="9" class="form-control" title="must be a valid Phone number"value="<?=$this->post['phoneNumber2'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-row col">
                <div class="col">
                    <label for="area"> City* </label>
                    <input type="text" name="area" id="area" class="form-control" required title="must be a valid address" value="<?=$this->post['area'] ?>">
                </div>
                <div class="col">
                    <div class="form-group"><label for="type">Type</label><input type="text" value="<?= $this->type ?>" class="form-control" disabled></div>
                </div>
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
<!-- <script>
    // function to get city names
    $(document).ready(function(){
        $.ajaxSetup({ cache: false });
        $('#area').keyup(function(){
            $('#result').html('');
            $('#state').val('');
            var searchField = $('#area').val();
            var expression = new RegExp(searchField, "i");
            $.getJSON('<?=PROOT?>app/cities.json', function(data) {
                var x = 0;
                $.each(data, function(key, value){    
                    if (value.name.search(expression) != -1)
                    {
                    $('#result').append('<li class="dropdown-item">'+value.name+'</li>');
                    x++;
                    }
                    // max number of items displayed
                    if (x == 5)
                    {
                        return false;
                    }
            });   
        });
    });
    
    $('#result').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
            $('#area').val($.trim(click_text[0]));
            $("#result").html('');
        });
    });
</script> -->
<?php $this->end(); ?>