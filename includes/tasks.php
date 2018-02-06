	<section>
		<h2>
			Your personal and secret to do list
		</h2>
		<ul>
			<?php
				$query = "SELECT * FROM tasks WHERE user_id = {$_SESSION['id']} " ;
				$result = mysqli_query($connection, $query);
				
				//while ($row = mysqli_fetch_array($result)) {
				//echo "<li class='class'>" . $row['title'] . "</li>";
				// }
				while($row = mysqli_fetch_array($result)) :
			?>
			
				<li class='class'>
					<?php echo $row['title']; ?>
					<a class="delete" href="delete.php?taskID=<?php echo $row['id']; ?>">Delete</a>
					<a class="edit" href="edit.php?taskID=<?php echo $row['id']; ?>">Edit</a>
				</li>
			
			<?php endwhile; ?>
		</ul>
		<form action="admin.php" method="post">
			<input class="text" type="text" name="taskName" placeholder="Write something personal or secret or illegal to your secret to-do list!">
			<input class="knapp" type="submit" name="addTask" value="Click HERE to add the personal/secret/illegal text to your secret to-do list">
		</form>
	</section>	