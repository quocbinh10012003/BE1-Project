<!-- Xu ly products -->
<?php
include_once 'db.php';

class ProductsDAO extends Db{
    //Tim kiem phan trang
            public function Find_Phantrang($ketqua, $page, $perPage)
            {
            // Tính số thứ tự trang bắt đầu
            $firstLink = ($page - 1) * $perPage;
            //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang
            //$sql = "SELECT * FROM products LIMIT $firstLink, $perPage";
            $sqla = parent::$connection->prepare("SELECT * FROM products WHERE name like '%$ketqua%' LIMIT $firstLink,$perPage");
            $sqla -> execute();
            $items = [];
            $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
            }
            //hien thi btn trang
            function paginate_key($url, $total, $page, $perPage, $key)
            {
                if($total <= 0) {
                return "";
                }
                //So luong trang = tong sp / so sp moi trang
                $totalLinks = ceil($total/$perPage);
                if($totalLinks <= 1) {
                return "";
                }
                $firstLink = ""; $prevLink =""; $lastLink=""; $nextLink=""; $link = "";
                //so trang
                for($j = 1; $j <= $totalLinks; $j++) //tao so page
                    {
                        $link = $link."<li><a href='$url?page=$j&key=$key'>$j</a></li>";
                    }
                if ($page > 1) { //neu la page thu 2
                    $firstLink = "<li><a href='$url?page=1&key=$key'>First</a></li>"; //xuat hien first
                    $prev = $page - 1; //set button prv
                    $prevLink = "<li><a href='$url?page=$prev&key=$key'><</a></li>"; //set button prv
                    }
                    if($page < $totalLinks) { //neu ko phai page cuoi
                        $next = $page + 1; //set button next
                        $nextLink = "<li><a href ='$url?page=$next&key=$key'> 
                        > &nbsp</a></li>"; //set button next
                    $lastLink = "<li><a href='$url?page=$totalLinks&key=$key'> 
                    Last</a></li>"; //set button last
                    }                           //danh so trang
                    return $firstLink.$prevLink.$link.$nextLink.$lastLink;
            }
            function paginate($url, $total, $page, $perPage)
            {
                if($total <= 0) {
                return "";
                }
                //So luong trang = tong sp / so sp moi trang
                $totalLinks = ceil($total/$perPage);
                if($totalLinks <= 1) {
                return "";
                }
                $firstLink = ""; $prevLink =""; $lastLink=""; $nextLink=""; $link = "";
                //so trang
                for($j = 1; $j <= $totalLinks; $j++) //tao so page
                    {
                        $link = $link."<li><a href='$url?page=$j'>$j</a></li>";
                    }
                if ($page > 1) { //neu la page thu 2
                    $firstLink = "<li><a href='$url?page=1'>First</a></li>"; //xuat hien first
                    $prev = $page - 1; //set button prv
                    $prevLink = "<li><a href='$url?page=$prev'><</a></li>"; //set button prv
                    }
                    if($page < $totalLinks) { //neu ko phai page cuoi
                        $next = $page + 1; //set button next
                        $nextLink = "<li><a href ='$url?page=$next'> 
                        > &nbsp</a></li>"; //set button next
                    $lastLink = "<li><a href='$url?page=$totalLinks'> 
                    Last</a></li>"; //set button last
                    }                           //danh so trang
                    return $firstLink.$prevLink.$link.$nextLink.$lastLink;
            }
            //Hien thi san pham cua 1 trang
            public function getAllProductsInPage($page, $perPage)
            {
            // Tính số thứ tự trang bắt đầu
            $firstLink = ($page - 1) * $perPage;
            //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang
            //$sql = "SELECT * FROM products LIMIT $firstLink, $perPage";
            $sqla = parent::$connection->prepare("SELECT * FROM products LIMIT $firstLink,$perPage");
            $sqla -> execute();
            $items = [];
            $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
            }
    public function getAllProducts(){
        
        $sqla = parent::$connection->prepare("SELECT * FROM products");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
        //CRUD
    //insert
    public function AddProducts($name, $price,$image, $description,$id_category)
    {
            $sql = "INSERT INTO products (`name`, `price`, `image`, `description`, `id_category`) VALUES ('$name', '$price','$image', '$description', '$id_category');";

        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        //Dong
        parent::$connection->close();
    }
    //xoa
    public function DelProducts($id)
    {
            $sql = "DELETE FROM `products` WHERE id = '$id'";

        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        parent::$connection->close();
    }
    //Tim kiem
    public function FindAllProducts($id){
        
        $sqla = parent::$connection->prepare("SELECT * FROM products WHERE id = '$id'");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Sua 
    public function EditProducts($idcu, $name, $price, $image, $description, $id_category)
    {
    
        $sql = "UPDATE `products` SET name ='$name', price = '$price', image = '$image', description = '$description', id_category = '$id_category' WHERE id='$idcu'";

        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
        }
        //Dong
        parent::$connection->close();
    }
    //Tim kiem theo danh muc
    public function FindProducts($id_category){
        
        $sqla = parent::$connection->prepare("SELECT * FROM products WHERE id_category = '$id_category'");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Tim kiem theo tu khoa
    public function FindKeyProducts($ketqua){
        
        $sqla = parent::$connection->prepare("SELECT * FROM products WHERE name like '%$ketqua%' || description like '%$ketqua%'");
        $sqla -> execute();
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
?>