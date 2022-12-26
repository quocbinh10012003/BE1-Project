<?php
include 'userDAO.php';
$id =  $_GET['id'];
$user = new UserDAO();
$user->DelUser($id);
header('location:user.php');
