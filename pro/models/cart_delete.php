<?php
  //Chay session
  session_start();
  $id =  $_GET['id'];

  $soluong;
  foreach($_SESSION['giohang'] as $sp){
    $soluong = $sp['soluong'];
    $idsanpham = $sp['ma san pham'];
    //chua ton tai thi 
        if($idsanpham == $id && $soluong >1){
            echo $soluong;
            $_SESSION['giohang'][$id]['soluong']=$soluong -1;
        }
        else if($idsanpham == $id && $soluong ==1){
            unset($_SESSION['giohang'][$id]);
            echo"het sp de xoa roi";
        }
    }
  header('location:cart.php');
?>