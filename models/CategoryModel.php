<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class CategoryModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct() {}
    //Viết thêm hàng mới
    // public function AddCategory($data){
    //     $sql = "insert into "
    // }
    public function danhsach()
    {
        $sql = "SELECT * FROM `category`";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getOneCategoryById($id)
    {
        $sql = "SELECT * FROM category where id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data;
    }
    public function updateCategory($id, $name)
    {
        $sql = "UPDATE category SET cat_name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category where id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->execute();
        return $data;
    }
    public function addCategory($cat_name){
        $sql= "INSERT INTO `category`( `cat_name`) VALUES ('$cat_name')";
        $stmt = $this->conn->prepare($sql);
         $data = $stmt->execute();
        return $data;
    }
}
