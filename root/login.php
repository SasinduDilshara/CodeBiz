<?php 
include 'core/init.php';

if (empty($_POST) === false) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email) === true || empty($password) === true) {
		$errors[] = 'You need to enter an email and password';	
	} else if (user_exists($email) === false) {
		$errors[] = 'We can\'t find your email. Have you registered?';
	} else if (user_active($email) === false) {
		$errors[] = 'You haven\'t activated your account';
	} else {
		$login = login($email, $password);
		if ($login === false) {
			$errors[] = 'Email/password is incorrect';
		} else {
			//set the user session 
			$_SESSION['user_id'] = user_id_from_email($email);
			//redirect to homepage
			header('Location: index.php');
			exit();
		}
	}

	//print_r($errors);
} else {
	echo 'landed on php';
}
include 'includes/overall/header.php';

echo output_errors($errors);
include 'includes/overall/footer.php';
?>