<?php
	include 'includes/db.php';
	session_start();
	
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
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
		
		if ($username === $db_username && $password === $db_password) {
			$_SESSION['username'] = $db_username;
			header("Location: index.php");
		}
		else {
			header("Location: login.php");
		}
	}
	
	$title = 'Login';
	include "includes/head.php";
	
?>

	<form class="login animated fadeInDown" action="login.php" method="post">
		<h3>Login</h3>
		<input type="text" name="username" placeholder="Username" required autofocus>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>