<div class="col-md-3 col-md-offset-3 well">
    <!-- <h3 class="text-center"> Register  </h3> -->

        <form class="form" action="AdvertisementsController.php?action=searchAction" method="get"> 
        <div class="form-group">
            <div>
            <label for="adType"><h4>I am looking for</h4></label><br>
                  <input type="radio" name="adType" id="adType"   value="Laundering" checked> Laundering<br>
                  <input type="radio" name="adType" id="adType"   value="Food"> Food<br>
                  <input type="radio" name="adType" id="adType"   value="Cleaning"> Cleaning<br>
            </div>
            <div>
                <label for="location"><h4>I live in</h4></label>
                <input 
                type="text" 
                name="location" 
                id="location" 
                class="form-control" 
                value="">
            </div>
        
        <div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value="Search" >
    </form>
</div>