<?php
	$bodyClass = "d-flex justify-content-center align-items-center";
	include 'includes/head.php';
	
	$query = "SELECT id FROM users";
	$result = mysqli_query($connection, $query);
	$numberOfUsers = mysqli_num_rows($result);
	echo $numberOfUsers;
?>
			<video autoplay loop muted>
				<source src="vid/1.ogv" type="video/ogg">
				Your browser does not support the video tag.
			</video>
			
			<main class="col-12 col-sm-8 col-lg-4 text-center">
				<h1 class="IndexText">This is a hacker friendly to-do list with <?php echo $numberOfUsers; ?> users!</h1>
				<a class="col-2 knappTEST1" href="login.php">LOGIN<a>
				<a class="col-2 knappTEST1" href="register.php">SIGNUP<a>
			</main>
		
<?php	include 'includes/footer.php'; ?>
