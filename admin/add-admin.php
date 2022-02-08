<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
<h1>Add Admin</h1>
<br /><br />
     <?php
     if(isset($_SESSION['add']))//checking whether the session is set or not
     {
          echo $_SESSION['add'];//Displaying session message if set 
          unset($_SESSION['add']);//Removing session message

     }
     ?>
<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>Full Name:</td>
<td> 
<input type="text" name="full_name"placeholder="Enter Your Name">
</td>
</tr>
<tr>
<td>Username:</td>
<td> 
<input type="text" name="username"placeholder="Your username">
</td>
</tr>
<tr>
<td>Password:</td>
<td> 
<input type="password" name="password"placeholder="Your password">
</td>
</tr>
<tr>
<td colspan="2"> 
<input type="submit" name="submit"value="Add Admin"class="btn-secondary">
</td>
</tr>
</table>
</form>

</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//process the value from the form and save it in the database
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
	//button clicked
	//echo "button clicked";
	//1. Get the data from the form
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//2. Sql query to save data in the database
	$sql = "INSERT INTO tbl_admin SET
	full_name = '$full_name',
	username = '$username',
	password = '$password'
	";

	//3. executing query and saving data into the database
	$res = mysqli_query($conn, $sql) or die(mysqli_error());


	//4. check whether the query is executed and whether data is inserted or not and display appropriate message
	if($res==TRUE)
	{
		//Data inserted
		//echo "Data inserted successfully";
		//create a session variable to display a message
		$_SESSION['add'] = "<div class='success'>Admin Added successfully</div>";
		//Redirect page to manage admin page 
		header('location:'.SITEURL.'admin/manage-admin.php');
	}
	else {
	//Data NOT inserted
			//create a session variable to display a message
		 $_SESSION['add'] = "<div class='error'>Failed to Add admin</div>";
		  header('location:'.SITEURL.'admin/manage-admin.php');
}

	
}


?>