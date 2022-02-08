<?php
//include contants.php file here
include('../config/constants.php');

//1. get the ID of Admin to be deleted
$id=$_GET['id'];
//2. create sql query to delete Admin
$sql = "DELETE FROM tbl_admin where id=$id";

//execute query 
			$res = mysqli_query($conn, $sql);

			//check whether the query executed successfully or not

if($res==true)
{
			//query executed successfully and admin deleted 
			//echo "Admin deleted";
			//create session variable to display message
          $_SESSION['delete'] = "<div class='success'>Admin Deleted successfully</div>";
		  //Redirect page to manage admin page 
		  header('location:'.SITEURL.'admin/manage-admin.php');
}
else {
	         //fail to delete admin
	         //echo "Failed to delete admin";
	         $_SESSION['delete'] = "<div class='error'>Failed to delete admin, Try Again Later</div>";
		     header('location:'.SITEURL.'admin/manage-admin.php');
}

//3. Redirect to manage Admin page with message (success/error)



?>