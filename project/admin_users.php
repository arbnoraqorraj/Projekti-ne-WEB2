<?php

//Lidhja me databaze
include 'config.php';

//Fillimi i session
session_start();

//Kontrollon nese ekziston nje session per admin dmth nese nje vlere eshte ruajtur ne nje session te quajtur admin
//id.Ne qofte se kjo vlere nuk egziston apo akoma nuk eshte vendosur atehere perdoruesi (admin)nuk eshte i kyqur
//dhe drejtohet te faqja e hyrjes(login)
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

//Ky kod kontrollon nëse ka një parametër "delete" në URL-në e kërkesës "GET". 
//Vendoset vlera e parametrit "delete" në variablën $delete_id.
//Ekzekutohet një kërkesë SQL "DELETE" për të fshirë një rekord nga tabela "users" në bazën e të dhënave,
//ku ID-ja është e barabartë me $delete_id.

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">
   <script src="js/admin_script.js"></script>

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users= mysqli_fetch_assoc($select_users)){

      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>">
         <?php echo $fetch_users['user_type']; ?></span> </p>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" 
         onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>


</body>
</html>