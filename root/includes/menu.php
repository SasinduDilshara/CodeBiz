<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
		if (logged_in() === true) {
			if ($user_data['type'] === 'customer') {
				echo '<li><a href="postrequset.php">Add request</a></li>';
			}
			else if ($user_data['type'] === 'provider') {
				echo '<li><a href="postad.php">Post An Ad</a></li>';
			}
			echo '<li><a href="edituser.php">Edit profile</a></li>';
			echo '<li><a href="logout.php">Log Out</a></li>';
		} else {
		 	echo '<li><a href="register.php">Register</a></li>';
		}
		?>

    </ul>
</nav>