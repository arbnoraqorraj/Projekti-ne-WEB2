<?php
include 'config.php';


session_start();



$admin_id =$_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>
   <script src="js/admin_script.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">
   <script src="js/admin_script.js"></script>

</head>
<body>


<?php include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <div class="box">
        

      <div class="box">
         <?php 
    
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
      
            $number_of_users = mysqli_num_rows($select_users);

         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>normal users</p>
      </div>

      <div class="box">
         <?php
         
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
        
            $number_of_admins = mysqli_num_rows($select_admins);
           
         ?>

         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin users</p>
      </div>

      <div class="box">
         <?php 

            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
       
            $number_of_account = mysqli_num_rows($select_account);
      
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>total accounts</p>
      </div>

      <div class="box">
         <?php 
        
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
         
            $number_of_messages = mysqli_num_rows($select_messages);
          
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>new messages</p>
      </div>

   </div>

</section>


</body>
</html>