<?php
// Fill in your database hostname, username, password and database name below

$MYSQLi = new mysqli("localhost", "root", "", "Harsh");

if(!$MYSQLi){
	die("Error: Cannot connect to the database");
}
?>