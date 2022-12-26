<?php
include 'productsDAO.php';

$mysqli = new mysqli("localhost","root","","mydbproject");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


if(isset($_POST['submit'])){
	$name = $_POST['Name'];
    $price = $_POST['Price'];
    $img = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
    $description = $_POST['Description'];
    $id_danhmuc = $_POST['Id_category'];
    $newPro = new ProductsDAO();
    $newPro->AddProducts($name, $price, $img, $description, $id_danhmuc);
	if($newPro){
		echo "insert success";
        header('location:addproducts?id=1.php');
	}
	else{
		echo "fail"; 
        header('location:addproducts?id=2.php');
	}
}
