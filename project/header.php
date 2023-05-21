<header class="header">
   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> new <a href="login.php">login</a> | <a href="register.php"> register </a> </p>
         <div class="account-box">
         <a href="logout.php" class="delete-btn">logout</a>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Bookly.</a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
         </nav>
         
         <div class="icons">
            <?php
  
               $select_cart_number = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'")
                or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
           
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)
         </span> </a>
         </div>
      </div>
   </div>
</header>