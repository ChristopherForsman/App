<?php
	session_start();
	$title = "Welcome";
	include "includes/head.php"
?>

<?php if ($_SESSION['username']) : ?>
	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
	<a href="logout.php">Logout <?php echo $_SESSION['username']; ?></a>
	
<?php else : ?>
	<h1>ACCESS DENIED</H1>
<?php endif; ?>
	
</body>
</html>