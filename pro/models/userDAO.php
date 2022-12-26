<!-- Xu ly products -->
<?php
include_once 'db.php';

class UserDAO extends Db{
    public function getAllUser(){
        
        $sqla = parent::$connection->prepare("SELECT * FROM user");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
        //CRUD
    //insert
    public function AddUser($name, $email,$password)
    {
            $sql = "INSERT INTO user (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";

        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        //Dong
        parent::$connection->close();
    }
    //xoa
    public function DelUser($id)
    {
            $sql = "DELETE FROM `user` WHERE id = '$id'";

        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        
        parent::$connection->close();
    }
    //Tim kiem
    public function FindAllUser($id){
        
        $sqla = parent::$connection->prepare("SELECT * FROM user WHERE id = '$id'");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Sua 
    public function EditUser($id, $name, $email, $password)
    {
    
        $sql = "UPDATE `user` SET name ='$name', email = '$email', password = '$password' WHERE id = '$id'";

        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        //Dong
        parent::$connection->close();
    }
}
?>