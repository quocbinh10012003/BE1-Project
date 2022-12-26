<?php
include 'productsDAO.php';
$id =  $_GET['id'];
$pro = new ProductsDAO();
$pro->DelProducts($id);
header('location:edit_admin.php');
