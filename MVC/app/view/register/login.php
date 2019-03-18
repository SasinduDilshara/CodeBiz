
<?php $this->setSiteTitle('Sign In'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "container">
	<h3 class="text-center p-4">Sign In</h3>
	<form class="form" action="<?=PROOT?>register/login" method="post" >
		<div class="form-group">
			<input type="text" name="username" id="username" class = "form-control" placeholder = "Username">
		</div>
		<div class="form-group">
			<input type="text" name="password" id="password" class="form-control" placeholder = "Password">
		</div>
		<div class="form-check"> 
			<input type="checkbox" class="form-check-input" name="remember_me" id="remember_me" value="on">
			<label class="form-check-label" for="remember_me" > Remember me
			</label>
		</div>
		<div> <?= $this->displayErrors; ?> </div>
		<div class="form-group">
			<input type="submit" class ="btn btn-primary" value="Login">
		</div>
	</form>
	
	<div>
		<a href="<?=PROOT?>register/register" class ="text-primary"> Register </a> <br>
		<a href = #  class ="text-primary"> Forget password ? </a>
	</div>

</div>

<?php $this->end(); ?>