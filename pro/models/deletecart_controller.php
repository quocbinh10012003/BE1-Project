<?php
  //Chay session
  session_start();
  $id =  $_GET['id'];

  unset($_SESSION['giohang'][$id]);
    
  header('location:cart.php');
?>