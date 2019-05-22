<?php $this->setSiteTitle( 'Forget Password'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:8rem; background-color: ;" >
 	<div class="card-header" style="text-align: center">
		Forgot Password
	</div>
	<div class="card-body">
	<form class="form" action="<?=PROOT?>emails/forgetpassword" method="post" ><br>
		<div class="form-group">
			<input type="text" name="email" id="email" class = "form-control" placeholder = "Type Your Email here">
		</div>
		<ul class="list-group" id="result"></ul>
		<div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value=" Send Email " >
        </div>
	</form>
	<div class="text-center">
		<a href="<?=PROOT?>" class="btn btn-xs btn-default" > Back </a>
	</div>
</div>

<?php $this->end(); ?>
