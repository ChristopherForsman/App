<?php
	include 'includes/head.php';
	
	if (!empty($_GET['taskID'])) {
		$taskID = $_REQUEST['taskID'];
	}
	
	if (!empty($_POST)) {
		$taskID = $_POST['taskID'];
		$query = "DELETE FROM tasks WHERE id = $taskID";
		$deleteTaskQuery = mysqli_query($connection, $query);
		header("Location: admin.php");
	}

?>

<form action="edit.php" method="post">
	<input type="text" name="taskName" value="">
	<input type="submit" name="editTask" value="Edit">
	<a href="admin.php">No</a>
</form>

</body>
</html>


