<?php
include 'userDAO.php';
$data = new userDAO();
$user = $data->getAllUser();

$email = $_POST['Email'];
$password = md5($_POST['Password']);

$item = 0;
foreach($user as $value):
    //Mã hóa mật khẩu
    if($value['email'] == $email && md5($value['password'])==$password){
        $item = $item +1;
    } 
endforeach; 

if($item >0){
    header('location:index_admin.php');
}
else{
    header('location:adminlogin.php?id=1');
}
