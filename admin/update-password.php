<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
<h1>Change Password</h1>
<br /><br />
<?php
if(isset($GET['ID']))
{
	$id=$_GET['id'];
}
?>

<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>Current password:</td>
<td> 
<input type="password" name="current_password"placeholder="current password">
</td>
</tr>
<tr>
<td>New password:</td>
<td> 
<input type="password" name="new_password"placeholder="new password">
</td>
</tr>
<tr>
<td>Confirm Password:</td>
<td> 
<input type="password" name="confirm_password"placeholder="confirm password">
</td>
</tr>
<tr>
<td colspan="2"> 
<input type="hidden" name="id"value="<?php echo $id ?>">
<input type="submit" name="submit"value="Change Password"class="btn-secondary">
</td>
</tr>
</table>
</form>

</div>
</div>


<?php

if(isset($_POST['submit']))
{
	//echo "clicked";

	//Get data from form
	$id=$_POST['id']; 
	$current_password=md5($_POST['current_password']);
	$new_password=md5($_POST['new_password']);
	$confirm_password=md5($_POST['confirm_password']);


	//check whether the user with current id and Password exists or not
	$sql = "SELECT * FROM tbl_admin WHERE id=$id AND Password='$current_password'";

	//execute query
	$res=mysqli_query($conn, $sql);

	if($res==TRUE)
	{
		//check whether data is available or not
		$count = mysqli_num_rows($res);


		if($count==1) 
		{
			//user existsand password can be changed.
			echo "user found";
			if($new_password==$confirm_password)
		{
			//update the Password
			//echo "Password match";
			$sql2 = "UPDATE tbl_admin SET
			Password='$new_password'
			WHERE id=$id
			";
			//execute the query
			$res2 = mysqli_query($conn, $sql2);
			//check whether the query is executed or not 
			if($res2==TRUE)
			{
				//Display success message
		     // Redirect user to manage admin page with success message
        $_SESSION['change-password'] = "<div class='success'>password changed successfully</div>";
		//Redirect page to manage admin page 
		header('location:'.SITEURL.'admin/manage-admin.php');
			}
			else 
			{
				//Display error message
			    // Redirect user to manage admin page with success message
	        $_SESSION['change-password'] = "<div class='error'>Failed to change password</div>";
		    header('location:'.SITEURL.'admin/manage-admin.php');
			}

		}
		else
		 {
	          // Redirect user to manage admin page with error message
		     $_SESSION['password-not-match'] = "<div class='error'>Password Did Not Match</div>";
		     header('location:'.SITEURL.'admin/manage-admin.php');

         }


		}

		else {
	          //user doesnt exist set message and Redirect
               $SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
               //Redirect user to manage admin page
		       header('location:'.SITEURL.'admin/manage-admin.php');
		  }
     
	} 

	    //check whether the new Password and confirm match or not

	    //change password if all of the above is true
}

?>

<?php include('partials/footer.php'); ?>