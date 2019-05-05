<?php $this->setSiteTitle('Ask overallRating'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Rate </div>
	<div class="card-body">
		<form class="form" action=<?=$this->postAction?> method="post">
		<legend>Rating:</legend>
		<div class="overallRating">
			<input type="radio" id="star5" name="overallRating" <?php if (isset($overalloverallRating) && $overalloverallRating=="5");?>value="5" /><label for="star5" title="Rocks!">5 stars</label>
			<input type="radio" id="star4" name="overallRating" <?php if (isset($overalloverallRating) && $overalloverallRating=="4");?>value="4" /><label for="star4" title="Pretty good">4 stars</label>
			<input type="radio" id="star3" name="overallRating" <?php if (isset($overalloverallRating) && $overalloverallRating=="3");?>value="3" /><label for="star3" title="Meh">3 stars</label>
			<input type="radio" id="star2" name="overallRating" <?php if (isset($overalloverallRating) && $overalloverallRating=="2");?>value="2" /><label for="star2" title="Kinda bad">2 stars</label>
			<input type="radio" id="star1" name="overallRating" <?php if (isset($overalloverallRating) && $overalloverallRating=="1")?>value="1" /><label for="star1" title="Sucks big time">1 star</label>
		</div>
		<br><br><br>
		<div class="form-group" style="text-align: center;">
			<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
		</div>
		<div class = "form-group text-right">
			<a onclick="window.history.back();" class="btn btn-default"> Back </a>
		</div>
		</form>
	</div>
</div>


<style>
.overallRating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.overallRating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.overallRating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    /* text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5); */
}

.overallRating:not(:checked) > label:before {
    content: '★ ';
}

.overallRating > input:checked ~ label {
    color: #f70;
    /* text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5); */
}

.overallRating:not(:checked) > label:hover,
.overallRating:not(:checked) > label:hover ~ label {
    color: gold;
    /* text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5); */
}

.overallRating > input:checked + label:hover,
.overallRating > input:checked + label:hover ~ label,
.overallRating > input:checked ~ label:hover,
.overallRating > input:checked ~ label:hover ~ label,
.overallRating > label:hover ~ input:checked ~ label {
    color: #ea0;
    /* text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5); */
}

.overallRating > label:active {
    position:relative;
    top:2px;
    left:2px;
}
</style>