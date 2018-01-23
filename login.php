<?php
	session_start();
	$title = 'Login';
	$bodyID = "login";
	include "includes/head.php";
	
	$db_username = ' ';
	$db_password = ' ';
	$errorMessage = ' ';
	
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		
		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);
		
		if (!$select_user_query) {
			die('Query failed') . mysqli_error($connection);
		}
		
		while($row = mysqli_fetch_array($select_user_query)) {
			$db_id = $row['id'];
			$db_username = $row['username'];
			$db_password = $row['password'];
		}
		
		$password = crypt($password, $db_password);
		
		if ($username === $db_username && $password === $db_password) {
			$_SESSION['id'] = $db_id;
			$_SESSION['username'] = $db_username;
			header("Location: index.php");
		}
		else {
//			$db_username = ' '; 
//			$db_password = ' ';
			$errorMessage = "Wrong username or password!";
		}
	}
	

	
?>

	<form class="login animated fadeInDown" action="login.php" method="post">
		<h3>Login</h3>
		<input type="text" name="username" placeholder="Username" required autofocus>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" name="login" value="Login">
		<a href="register.php">New user? Sign up here</a>
	</form>
		<?php if ($errorMessage) : ?>
		<div id="alert">
		<?php echo $errorMessage; ?>
		</div>
		<?php endif; ?>
</body>
</html>