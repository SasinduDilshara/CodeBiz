<?php $this->setSiteTitle('Choose Requests'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

	<h2 class="text-center"> Choose your location </h2>

	<div class="col-md-3 col-md-offset-3 well">

        <form class="form" action=<?=$this->postAction?> method='GET'>
        <div class="form-group">
            <div>
                <label for="area"><h4>Location</h4></label>
                <input 
                type="text" 
                name="area" 
                id="area" 
                class="form-control""
                value= <?=currentUser()->area ?>>
            </div>
        
        <div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value="Search" >
    </form>
</div>



<?php $this->end(); ?>