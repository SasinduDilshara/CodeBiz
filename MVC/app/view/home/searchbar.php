<div class="col-md-3 col-md-offset-3 well">
    <!-- <h3 class="text-center"> Register  </h3> -->

        <form class="form" action="advertisements/search" method="GET"> 
        <div class="form-group">
            <div>
            <label for="type"><h4>I am looking for</h4></label><br>
                  <input type="radio" name="type" id="type"   value="Laundering" checked> Laundering<br>
                  <input type="radio" name="type" id="type"   value="Catering"> Catering<br>
                  <input type="radio" name="type" id="type"   value="Cleaning"> Cleaning<br>
            </div>
            <div>
                <label for="area"><h4>I live in</h4></label>
                <input 
                type="text" 
                name="area" 
                id="area" 
                class="form-control" 
                value="">
            </div>
        
        <div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value="Search" >
    </form>
</div>