<div style="text-align:center">

<?php if(!currentUser() || currentUser()->userType == 'Customer'): ?>
    <div class="text-white text-uppercase" style="font-family:Sans-serif;font-size:4rem;padding:5rem 1rem;">Everything You need in one place</div>
    <div class="navbar navbar-expand-sm navbar-light" style="display:inline-block;background-color:rgba(0,0,0,0.8);padding:8px;">
    <!-- <h3 class="text-center"> Register  </h3> -->
        <form class="form-inline my-2 my-lg-0"action="<?=PROOT?>advertisements/search" method="GET">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item col bg-light" style="padding:6px;">
                    <div class="input-select">
                        <select data-trigger="" class="custom-select"name="type" required>
                            <option disabled selected value>I'm looking for</option>
                            <option value="Laundering" checked> Laundering</option>
                            <option value="Catering"> Catering</option>
                            <option value="Cleaning"> Cleaning</option>
                        </select>
                    </div>
                </li>
                <?php if(!currentUser()): ?>

                    <li class="nav-item bg-light" style="padding:6px;">
                    <input type="text" name="area" id="area" class="form-control" value="" placeholder="I live in">
                    
                </li>
<?php endif; ?>

            
                
<?php if(currentUser()): ?>
                <li class="nav-item bg-light" style="padding:6px;">

                    <input type="text" name="area" id="area" class="form-control" value="<?=currentUser()->area?>" placeholder="I live in">
                
                </li>
<?php endif; ?>
                <li class="nav-item col bg-light" style="padding:6px;">
                    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Search" >
                </li>
            </ul>
        </form>
    </div>
</div>
<?php elseif(currentUser()->userType == 'Provider'): ?>
    <div class="text-white text-uppercase" style="font-family:Sans-serif;font-size:4rem;padding:5rem 1rem;">Find Your Requests</div>
    <div class="navbar navbar-expand-sm navbar-light" style="display:inline-block;background-color:rgba(0,0,0,0.8);padding:8px;">
        <form class="form-inline my-2 my-lg-0"action="<?=PROOT?>requests/search" method="GET">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item bg-light" style="padding:6px;">
                    <input type="text" name="area" id="area" class="form-control" value="<?=currentUser()->area ?>">
                </li>
                <li class="nav-item col bg-light" style="padding:6px;">
                    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Search" >
                </li>
            </ul>
        </form>
    </div>
<?php endif; ?>