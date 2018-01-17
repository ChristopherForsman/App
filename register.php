<?php
	include 'includes/db.php';
	session_start();
	
	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//Int minns ja va e hejt, men de här e he de som stoppar ejn att skriv kommandon i inloggningsfälten.l
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		
		//kryptering åv lösenord
		$hashFormat = "$2y$10$";
		$salt = "RenaultAndPeugeotIsGay";
		$hash_and_salt = $hashFormat . $salt;
		$password = crypt($password, $hash_and_salt);
		
		$query = "INSERT INTO users(username, password)";
		$query .= "VALUES ('$username', '$password')";
		
		$result = mysqli_query($connection, $query);
		
		if (!$result) {
			die("Han är död, Jim!");
		}
	}
	
	$title = 'register';
	include "includes/head.php";
	
?>

	<form class="login animated fadeInDown" action="register.php" method="post">
		<h3>Register</h3>
		<input type="text" name="username" placeholder="Username" required autofocus>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" name="register" value="Register">
		<a href="login.php">Already a user? Login here</a>
	</form>
</body>
</html>