<?php
//start session
session_start();
//create constants to store nonrepeating values
define('SITEURL','http://localhost:8080/talam-computers/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'computer-order');

	$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//database connection
	$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>