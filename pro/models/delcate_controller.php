<?php
include 'categoryDAO.php';
$id =  $_GET['id'];
$danhmuc = new danhmucDAO();
$danhmuc->DelDanhmuc($id);
header('location:editcate.php');
