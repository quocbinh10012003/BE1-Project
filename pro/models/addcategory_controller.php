<?php
include 'categoryDAO.php';
$name = $_POST['Name'];
$detail = $_POST['Detail'];

$newDanhmuc = new danhmucDAO();
$newDanhmuc->AddDanhmuc($name, $detail);


if($newDanhmuc){
    echo "insert success";
    header('location:addcategory?id=1.php');
}
else{
    echo "fail"; 
    header('location:addcategory?id=2.php');
}