<?php
include 'userDAO.php';

//lay id san pham
$id = $_GET['id'];
//Lay thong tin moi

$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];

$user = new UserDAO();
$user->EditUser($id, $name, $email, $password);
header('location:user.php');