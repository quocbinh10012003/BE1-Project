<!-- Xu ly danh muc -->
<?php
include_once 'db.php';

class danhmucDAO extends Db{
    public function getAllDanhmuc(){
        
        $sqla = parent::$connection->prepare("SELECT * FROM category");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
        //CRUD
    //insert
    public function AddDanhmuc($name, $detail)
    {
            $sql = "INSERT INTO category (`name`, `detail`) VALUES ('$name','$detail');";

        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        //Dong
        parent::$connection->close();
    }

    public function DelDanhmuc($id)
    {
            $sql = "DELETE FROM `category` WHERE id = '$id'";

        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        
        parent::$connection->close();
    }
    //Tim kiem
    public function FindAllDanhmuc($id){
        
        $sqla = parent::$connection->prepare("SELECT * FROM category WHERE id = '$id'");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Sua 
    public function EditDanhmuc($idcu, $name, $detail)
    {
    
        $sql = "UPDATE `category` SET name ='$name', detail = '$detail' WHERE id='$idcu'";

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