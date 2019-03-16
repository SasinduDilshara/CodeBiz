
<?php $this->setSiteTitle('Sign In'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "col-md-6 col-offset-3 well">
<form class="form" action="<?=PROOT?>register/login" method="post">
	<div<?= $this->displayErrors; ?> </div>
	<h3 class="text-center">Sign In</h3>
<div class="form-group">
	<label for="username" > Username </label>
	  <input type="text" name="username" id="username" class = "form-control">
</div>

<div class="form-group">
	<label for="password" > Password </label>
	  <input type="text" name="password" id="password" class="form-control" size ="10">
</div>

<div class="form-group">
	<label for="remember_me" > Remember_me 
	  <input type="checkbox" name="remember_me" id="remember_me" value="on">
	</label>
</div>

<div class="form-group">
	  <input type="submit" class ="btn btn-large btn-primary" value="Login">
</div>

<div >
	  <a href="<?=PROOT?>register/register" class ="text-primary"> Register </a>
</div>
<br>

<p> Forget password? <p>
	

<div >
	   <a href = #  class ="text-primary"> Forget password </a>
</div>



<?php $this->end(); ?>