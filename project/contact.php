<?php


include 'config.php';

session_start();


$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $email =$_POST['email'];
   $number = $_POST['number'];
   $msg = $_POST['message'];


   $select_message = mysqli_query($conn, "SELECT * FROM message WHERE name = '$name' AND email = '$email'
    AND number = '$number' AND message = '$msg'") or die('query failed');



   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES
      ('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>
   <script src="js/script.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/faq.css">
   

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>contact us</h3>
   <p> <a href="home.php">home</a> / contact </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
      <?php
  
      if(isset($message)){
      foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
       
   </form>

</section>
<section>
<h3>Frequently Asked Questions</h3>
    <div class="faq-container">
        <div class="faq">
            <h4>How can I contact customer support?</h4>
            <p>You can contact our customer support team by filling out the form above or by emailing us at support@example.com.</p>
        </div>
        <div class="faq">
            <h4>What is the average response time for messages?</h4>
            <p>Our team typically responds to messages within 24-48 hours.</p>
        </div>
        <div class="faq">
            <h4>Can I edit or delete a message after sending it?</h4>
            <p>Unfortunately, once a message is sent, it cannot be edited or deleted. Please make sure to review your message before submitting.</p>
        </div>
        <div class="faq">
            <h4>Are there any fees for using the contact form?</h4>
            <p>No, using the contact form is completely free of charge.</p>
        </div>
        <div class="faq">
            <h4>What information do I need to provide in the form?</h4>
            <p>Please provide your name, email address, phone number, and the message you want to send.</p>
        </div>
        <div class="faq">
            <h4>Can I expect a confirmation email after sending a message?</h4>
            <p>Yes, you should receive a confirmation email once your message is successfully submitted.</p>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>



</body>
</html>