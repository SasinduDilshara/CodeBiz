<?php $this->setSiteTitle('Ask Rating'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well">
	<form class="form" action=<?=$this->postAction?> method="post">
	
 		<h2 class="text-center"> Ask Rating</h2>

 		Gender:
			<input type="radio" name="overallRating"
			<?php if (isset($overallRating) && $overallRating=="1")?>
			value="1">1
			<input type="radio" name="overallRating"
			<?php if (isset($overallRating) && $overallRating=="2");?>
			value="2">2
			<input type="radio" name="overallRating"
			<?php if (isset($overallRating) && $overallRating=="3");?>
			value="3">3
			<input type="radio" name="overallRating"
			<?php if (isset($overallRating) && $overallRating=="4");?>
			value="4">4
			<input type="radio" name="overallRating"
			<?php if (isset($overallRating) && $overallRating=="5");?>
			value="5">5

</div>

 	<div class="form-group" style="text-align: center;">
		<?= submitBlock('Save',['class'=>'btn btn-primary']) ?>
	</div>
	<div class = "form-group text-right">
		<a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-default"> Cancel </a>
	</div>

<?php $this->end(); ?>