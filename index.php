<?php
	session_start();
	$title = "Welcome";
	include "includes/head.php"
?>

	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
	
</body>
</html>