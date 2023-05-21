<?php


include 'config.php';

 session_start();

 session_destroy();

 if (isset($_COOKIE["password"]) AND isset($_COOKIE["email"])){

  setcookie("password", '', time() - (3600));

  setcookie("email", '', time() - (3600));

 }

 header('location:login.php');



?>
 