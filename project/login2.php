<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $pass = md5($_POST['password']);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'")
      or die('query failed');


   if (mysqli_num_rows($select_users) > 0) {
      $row = mysqli_fetch_assoc($select_users);

      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_id'] = $row['id'];

         setcookie("email", $email, time() + (86400 * 30), "/"); // Cookie expires after 30 days
         setcookie("password", $pass, time() + (86400 * 30), "/"); // Cookie expires after 30 days

         echo 'success';
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];

         setcookie("email", $email, time() + (86400 * 30), "/"); // Cookie expires after 30 days
         setcookie("password", $pass, time() + (86400 * 30), "/"); // Cookie expires after 30 days

         echo 'success';
      }
   } else {
      echo 'error';
   }
}
?>
<?php
    $Month = 2592000 + time();
    //this adds 30 days to the current time
    setcookie(AboutVisit, date("F jS - g:i a"), $Month);
if(isset($_COOKIE['AboutVisit']))
{
$last = $_COOKIE['AboutVisit'];
echo "Welcome back! <br> You last visited on ". $last;
header('location:home.php');
}
else
{
echo "Welcome to Your Server!";
header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div id="message-container"></div>

<div class="form-container">
   <form id="loginForm" method="post">
      <h3>Login now</h3>
      <input type="email" name="email" placeholder="Enter your email" required class="box">
      <input type="password" name="password" placeholder="Enter your password" required class="box">
      <input type="submit" name="submit" value="Login now" class="btn">
      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>
</div>

<script>
   $(document).ready(function() {
      $('#loginForm').submit(function(event) {
         event.preventDefault();

         var email = $('input[name="email"]').val();
         var password = $('input[name="password"]').val();

         $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {
               email: email,
               password: password
            },
            success: function(response) {
               if (response === 'success') {
                  window.location.href = 'home.php';
               } else {
                  $('#message-container').html('<div class="message"><span>Incorrect email or password!</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>');
               }
            }
         });
      });
   });
</script>

</body>
</html>
