
<?php include('../config/constants.php'); ?>

<html>
<head>
<title>login computer order system</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<div class="login">
<h1 class="text-center">Login</h1>
<br><br>
<!--form starts here -->
<form action=""method="POST"class="text-center">
Username:<br>
<input type="text" name="username"placeholder="Enter username"><br><br>
Password:<br>
<input type="password" name="password"placeholder="Enter Password">
<br><br>
<input type="submit" name="submit"value="Login"class="btn-primary">
<br><br>
</form>
<!--form ends here -->

<p class="text-center">Created by <a href="www.talam.com">Talam Technologies</a></p>
</div>
</body>
</html>
<?php

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
	//process for logn
	// 1. Get the data from login form
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 //sql to check whether the user with Username and Password exists or not
	 $sql = "SELECT FROM tbl_admin WHERE username = '$username' AND password='$password'";
	 // execute the query
	 $res = mysqli_query($conn, $sql);
	 // count rows to check whether the user exists or not
	 $count = mysqli_num_rows($res);

	 if($count==1)
	 {
		  //user available
	 }
	 else 
	 {
	       //user not available
     }



}

?>
