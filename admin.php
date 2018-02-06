<?php
session_start();
$title = "Welcome";
$bodyID = "index";
include "includes/head.php";

if (isset($_POST['addTask'])) {
	addTask();
}



?>

<?php if (isset($_SESSION['username'])) : 

$uname =  $_SESSION['username'];
if (strlen($uname) > 0) {
	if ($uname[strlen($uname) - 1] !== 's') {
		$uname .= "'s";
	} else {
		$uname .= "'";
	}
}

?>
	 <ul class="ul">
		<li class="li">
			<a href="/">
				<img class=" knappBild" src="img/TO-DO-LOGO.svg" alt="TO-DO">
				Home
			</a></li>
		<li class="li"><a href="news.asp">News</a></li>
		<li class="li"><a href="contact.asp">Contact</a></li>
		<li class="li"><a href="about.asp">About</a></li>
		<li class="logout"><a href="logout.php">Logout <?php echo $_SESSION['username']; ?></a>
	</ul> 
	<div class="welcome">
	<h1>Welcome to <?php echo $uname; ?> to-do list</h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<?php include "includes/tasks.php"; ?>
		</div>	
	</div>
	
<?php else : ?>
	<h1>ACCESS DENIED</H1>
<?php endif; ?>

<?php include "includes/footer.php"; ?>