<div style="text-align:center">
    <div class="text-white text-uppercase" style="font-family:Sans-serif;font-size:4rem;padding:6rem 1rem;">Find Your Services</div>
    <div class="navbar navbar-expand-sm navbar-light" style="display:inline-block;background-color:rgba(0,0,0,0.8);">
    <!-- <h3 class="text-center"> Register  </h3> -->
        <form class="form-inline my-2 my-lg-0"action="advertisements/search" method="GET">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item col bg-light" style="padding:12px;">
                    <div class="input-select">
                        <select data-trigger="" class="custom-select"name="type" required>
                            <option disabled selected value>I'm looking for</option>
                            <option value="Laundering" checked> Laundering</option>
                            <option value="Catering"> Catering</option>
                            <option value="Cleaning"> Cleaning</option>
                        </select>
                    </div>
                </li>
                <li class="nav-item bg-light" style="padding:12px;">
                    <input type="text" name="area" id="area" class="form-control" value="" placeholder="I live in">
                </li>
                <li class="nav-item col bg-light" style="padding:12px;">
                    <input type="submit" class="btn btn-secondary my-2 my-sm-0" value="Search" >
                </li>
            </ul>
        </form>
    </div>
</div>