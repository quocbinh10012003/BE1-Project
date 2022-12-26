<?php
include 'categoryDAO.php';

//lay id san pham
$id = $_GET['id'];
//Lay thong tin moi

$name = $_POST['Name'];
$detail = $_POST['Detail'];

$newdanhmuc = new danhmucDAO();
$newdanhmuc->EditDanhmuc($id, $name, $detail);
header('location:editcate.php');