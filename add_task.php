<?php
// Database Connection File
require_once 'database_connection.php';

// Check to be sure that the only request we can process is POST REQUEST
if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("POST"))
{
	if(isset($_POST['add']))
	{
		if( isset($_POST['task']) && !empty($_POST['task']) ) // Be sure the task brought here is not an empty field
		{
			// Variable declaration
			$task = trim(strip_tags(htmlspecialchars($_POST['task'])));
			
			// Save the task into the database
			mysqli_query($MYSQLi, "insert into `task` values(0, '".mysqli_real_escape_string($MYSQLi, $task)."', '".mysqli_real_escape_string($MYSQLi, 'Pending')."')") or die(mysqli_errno());
			
			echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		}
		else
		{
			echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		}
	}
	else
	{
		echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		//die('Sorry, no proper data was passed');
	}
}
else 
{
	echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
	// Deny access if the request brought to this page is not a POST REQUEST
	//die('Access Denied');
}
?>