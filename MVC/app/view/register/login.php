
<?php $this->setSiteTitle('Sign In'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:8rem; background-color: ;" >
 	<div class="card-header" style="text-align: center">
		 Login
	</div>
	<!-- <h3 class="text-center p-4">/h3> -->
	<div class="card-body">
	<form class="form" action="<?=PROOT?>register/login" method="post" >
		<div class="form-group">
			<input type="text" name="username" id="username" class = "form-control" placeholder = "Username">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control" placeholder = "Password">
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" name="remember_me" id="remember_me" value="on">
			<label class="form-check-label" for="remember_me" > Remember me
			</label>
		</div>
		<div> <?= $this->displayErrors; ?> </div>
		<div class="form-group" style="text-align: center;">
			<input type="submit" class ="btn btn-primary" value="Login" >
		</div>
	</form>

	<div>
		<a href="<?=PROOT?>register/register" class ="text-primary"> Register </a> <br>
		<a href = #  class ="text-primary"> Forget password ? </a>
	</div>

</div>
</div>

<?php $this->end(); ?>