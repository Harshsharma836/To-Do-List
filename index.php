<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>To-do list using PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid" style="float: right;">
        <a class="navbar-brand" href="">Back to Tutorial</a>
    </div>
</nav>

<div class="col-md-3"></div>
<div class="col-md-6 well" style="padding-bottom:0px !important;">
    <h3 class="text-primary" style="margin-top:0px;">To-do list using PHP and MySQLi</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <div class="col-md-2"></div>
    <div class="col-md-12">
        
        <form method="POST" class="form-inline" action="add_task.php">
            <input type="text" class="form-control" name="task" style="min-width:75%" required/>
            <button class="btn btn-primary form-control" name="add">Add Task</button>
        </form>
        
    </div>
    <br /><br /><br />
    <table class="table" style="margin-bottom:0px !important;">
        <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
		// Database Connection File
        require 'database_connection.php';
        
		// Check for all the task in the database and if there is task, get them
        if( mysqli_num_rows( $check_tasks = mysqli_query($MYSQLi, "select * from `task` order by `task_id` asc")) )
        {
            $line_number = 1;
			// Fetch all the tasks brought from the database and display them below
            while( $get_tasks = mysqli_fetch_array($check_tasks) ) 
            {
                ?>
                <tr>
                    <td><?php echo $line_number++?></td>
                    <td><?php echo $get_tasks['task']?></td>
                    <td><?php echo $get_tasks['status']?></td>
                    <td colspan="2">
                        <?php
                        if(isset($get_tasks['status']) && $get_tasks['status'] != "Completed"){
                            echo '<a href="update_task.php?task_id='.$get_tasks['task_id'].'" class="btn btn-success" style="padding:3px 6px;"><span class="glyphicon glyphicon-check" title="Set Task to Completed"></span></a>&nbsp;&nbsp;';
                        }
                        ?>
                         <a href="delete_task.php?task_id=<?php echo $get_tasks['task_id']?>" class="btn btn-danger" style="padding:3px 6px;"><span class="glyphicon glyphicon-remove" title="Remove Task"></span></a>
                    </td>
                </tr>
                <?php
            }
        }
        else
        {
            echo 'No task has been added to the system yet';
        }
        ?>
        </tbody>
    </table>
</div>


</body>
</html>