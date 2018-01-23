<?php
session_start();
$title = "Welcome";
$bodyID = "index";
include "includes/head.php";

if (isset($_POST['addTask'])) {
	addTask();
}

?>

<?php if (isset($_SESSION['username'])) : ?>
	 <ul class="ul">
		<li class="li"><a href="default.asp">Home</a></li>
		<li class="li"><a href="news.asp">News</a></li>
		<li class="li"><a href="contact.asp">Contact</a></li>
		<li class="li"><a href="about.asp">About</a></li>
		<li class="logout"><a href="logout.php">Logout <?php echo $_SESSION['username']; ?></a>
	</ul> 
	<div class="welcome">
	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
	</div>
	<section>
		<h2>
			Your personal and secret to do list
		</h2>
		<ul>
			<?php
				$query = "SELECT title FROM tasks WHERE user_id = {$_SESSION['id']} " ;
				$result = mysqli_query($connection, $query);
				
				while ($row = mysqli_fetch_array($result))
					echo "<li class='class'>" . $row['title'] . "</li>";
				
			?>
		</ul>
		<form action="index.php" method="post">
			<input class="text" type="text" name="taskName" placeholder="Write something personal or secret or illegal to your personal and secret to-do list!">
			<input class="knapp" type="submit" name="addTask" value="Click HERE to add you personal or secret or illegal text to your personal and secret to-do list">
		</form>
	</section>	
<?php else : ?>
	<h1>ACCESS DENIED</H1>
<?php endif; ?>
	
</body>
</html>