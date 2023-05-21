<?php

include 'config.php';


session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="script.js"></script>
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">
   <div class="flex">
      <div class="image">
         <img src="images/about-img.jpg" >
      </div>
      <div class="content">
         <h3>why choose us?</h3>
         <p>We have a regular update of our collection, ensuring that we always 
            have new and fresh titles to offer you. We also provide book search and delivery to 
            your doorstep, making purchasing your preferred books very easy and convenient for you.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>
   </div>
</section>


<section class="authors">
    <h1 class="title">greate authors</h1> 
   <div class="box-container">
      
      <div class="box">
         <img src="image1/IsmailKadare.jpg" >
         <h3>Ismail Kadare</h3>
      </div>

      <div class="box">
         <img src="image1/BrunildaZllami.jpg" >
         <h3>Brunilda Zllami</h3>
      </div>

      <div class="box">
         <img src="image1/NicholasSparks.jpg" >
         <h3>Nicholas Sparks</h3>
      </div>

      <div class="box">
         <img src="image1/CollenHover.jpg" >
         <h3>Colleen Hoveer</h3>
      </div>

      <div class="box">
         <img src="image1/AlbatrosRexhaj.jpg" >
         <h3>Albatros Rexhaj</h3>
      </div>

      <div class="box">
         <img src="image1/RhondaByrnes.jpg" >
         <h3>Rhonda Byrnes</h3>
      </div>



   </div>

</section>
<?php include 'footer.php'; ?>

</body>
</html>