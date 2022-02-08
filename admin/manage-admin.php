
<?php include('partials/menu.php'); ?>
<!--main content starts here-->
<div class="main-content">
<div class="wrapper">
     <h1>Manage Admin</h1>
     <br /> <br /> 

     <?php
     if(isset($_SESSION['add']))
     {
          echo $_SESSION['add'];//Displaying session message 
          unset($_SESSION['add']);//Removing session message
     }
         if(isset($_SESSION['delete']))
     {
          echo $_SESSION['delete'];//Displaying session message 
          unset($_SESSION['delete']);//Removing session message
     }

          if(isset($_SESSION['update']))
     {
          echo $_SESSION['update'];//Displaying session message 
          unset($_SESSION['update']);//Removing session message
     }
            if(isset($_SESSION['user-not-found']))
     {
          echo $_SESSION['user-not-found'];//Displaying session message 
          unset($_SESSION['user-not-found']);//Removing session message
     }
           if(isset($_SESSION['password-not-match']))
     {
          echo $_SESSION['password-not-match'];//Displaying session message 
          unset($_SESSION['password-not-match']);//Removing session message
     }
             if(isset($_SESSION['change-password']))
     {
          echo $_SESSION['change-password'];//Displaying session message 
          unset($_SESSION['change-password']);//Removing session message
     }
     ?>
     <br /> <br />
     <!-- button to add admin-->
     <a href="add-admin.php" class="btn-primary">Add Admin</a>
     <br /> <br /><br />
    <table class="tbl-full">
    <tr>
    <th>S.N</th>
    <th>Full Name</th>
    <th>Username</th>
    <th>Actions</th>
    </tr>

    <?php
    //query to get all admins
    $sql="SELECT * FROM tbl_admin";
    //execute the query
    $res=mysqli_query($conn, $sql);
     
    //check whether the query is executed or notn
    if($res==TRUE)
    {
        //count rows to check whether we have data in the database or not
        $count = mysqli_num_rows($res); //function to get all the rows in the database

        $sn=1; //create a variable and assign the value

        //check the num of rows
        if($count>0)
        {
            //we have data in database  
            while($rows = mysqli_fetch_assoc($res))
            {
                //using while loop to get data from database
                //and while loop will run as long as we have data in database
               
                //get individual data
                $id=$rows['id'];
                $full_name=$rows['full_name'];
                $username=$rows['username'];

                //display the values in our table
                ?>

                     <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"class="btn-primary">Change Password</a>
                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                        </td>
                     </tr>

                <?php

            }
             
        }
        else {
	//we do not have data in the database
    }

    }
    
    ?>


    </table>
  
</div>
</div>
<!--main content ends here-->

<?php include('partials/footer.php'); ?>
