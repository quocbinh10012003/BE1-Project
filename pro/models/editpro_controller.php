<?php
include 'productsDAO.php';

//lay id san pham
$id = $_GET['id'];

$data = new ProductsDAO();
$pro = $data->FindAllProducts($id);
       
$image;                 

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
        if ($img == null)
        {
            foreach($pro as $item):
            echo"ko co anh";
            $img = addslashes($item['image']);
            endforeach;
        }
        else{
            echo"co anh roi ne ";
        }
        
        //$img = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
        //echo $img;
    
    $description = $_POST['Description'];
    $id_danhmuc = $_POST['Id_category'];

    $newPro = new ProductsDAO();
    $newPro->EditProducts($id, $name, $price, $img, $description, $id_danhmuc);
	if($newPro){
		echo "insert success";
        header('location:edit_admin.php');
	}
	else{
		echo "fail"; 
        header('location:edit_admin.php');
	}
}
