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
    header('location:index?id=1.php');
}
else{
    header('location:userlogin.php?id=1');
}
