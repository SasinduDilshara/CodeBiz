
<?php $this->start('body'); ?>
<!-- <h1 class ="text-center red"> Welcome you </h1> -->

<!-- extra file -->

<!-- search bar -->

<?php include 'searchbar.php' ?>
<div>
	<?php include 'showrequests.php' ?>
	
</div>
<div>
	<?php include 'notificationsbutton.php' ?>
</div>

<div>
	<?php include 'showConfirmRequests.php' ?>
</div>

<?php $this->end(); ?>