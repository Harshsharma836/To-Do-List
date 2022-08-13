<?php
// Database Connection File
require_once 'database_connection.php';

// Check to be sure that the only request we can process is POST REQUEST
if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("GET"))
{
	
	if(isset($_GET['task_id']) && !empty($_GET['task_id'])) // Be sure the task ID brought here is not an empty field
	{
		// Variable declaration
		$task_id = trim(strip_tags($_GET['task_id']));
		
		// Update the database to set the task to Completed
		mysqli_query($MYSQLi, "update `task` set `status` = '".mysqli_real_escape_string($MYSQLi, 'Completed')."' where `task_id` = '".mysqli_real_escape_string($MYSQLi, $task_id)."' limit 1") or die(mysqli_errno());
		
		echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
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
	// Deny access if the request brought to this page is not a GET REQUEST
	//die('Access Denied');
}
?>