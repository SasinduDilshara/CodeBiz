<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (empty($_POST) === false) {
	//check if all fields are filled
	$required_fields = array('email', 'password', 'password_again', 'first_name');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[]  = 'Firelds marked with asterisk are required';
			break 1; 
		}
	}
	if (empty($errors) === true) {
		//check if email already exists
		if (user_exists($_POST['email']) === true) {
			$errors[] = 'Email is already in use';
		}
		//check lenght of password
		if (strlen($_POST['password']) <= 6) {
			$errors[] = 'Your password must have six charactes';
		}
		//match password
		if (strlen($_POST['password']) !== $_POST['password_again']) {
			$errors[] = 'Your passwords do not match';
		}
		//is email valid?
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Enter a valid email address';
		}
	}

	//print_r($errors);
}


?>
<h1>Register</h1>

<?php
if (empty($_POST) === true && empty($errors) === true) {
	//register user
}
else {
	echo output_errors($errors);
}
?>
<form action="" method="post">
	<ul>
		<li>
			Email*:<br>
			<input type="text" name="email">
		</li>
		<li>
			Password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			Password again*:<br>
			<input type="password" name="password_again">
		</li>
		<li>
			First Name*:<br>
			<input type="text" name="first_name">
		</li>
		<li>
			Last Name*:<br>
			<input type="text" name="last_name">
		</li>
		<li>
			<input type="submit" value="Register">
		</li>
	</ul>
</form>
<?php include 'includes/overall/footer.php' ?>