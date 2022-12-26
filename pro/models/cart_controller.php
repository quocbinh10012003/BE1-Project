<?php
  //Chay session
  session_start();
  $id = $_GET['id'];

  //Lay thong tin san pham
  include_once 'productsDAO.php';
  $data = new ProductsDAO();
  $pro = $data->FindAllProducts($id);
 
 $_SESSION["sanpham"] = $id;
 $idsp;
 $namesp;
 $price;
 $image;
 $description;
 $id_danhmuc;
 $soluong;

  foreach($pro as $item) {
    $idsp = $item['id'];
    $namesp = $item['name'];
    $price = $item['price'];
    // $image = addslashes($item['image']);
    $description = $item['description'];
    $id_danhmuc = $item['id_category'];
    $soluong = $soluong +1;
  }
  if(!isset($_SESSION['giohang'][$id])){
    $_SESSION['giohang'][$id] = array(
        'ma san pham' => $idsp,
        'ten san pham' => $namesp,
        'Gia' => $price,
        'Hinh' => $item['image'],
        'Mo ta' => $description,
        'Id_danhmuc' => $id_danhmuc,
        'soluong' => $soluong
    );
  }
   else{
     $_SESSION['giohang'][$id]['soluong']+=$soluong;
   }
header('location:cart.php');

?>
