<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class AuthModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn eamail có tồn tại ko
    public function findUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        // Kiểm tra password đúng hay không
        if ($user && $password === $user['password']) {
            return $user;
        }

        return false;
    }
    //Kiểm tra email đã tồn tại chx
    public function checkEmailExists($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":email" => $email]);
        return $stmt->fetch();
        // Nếu có kết quả tức là đã tồn tại
    }

    //tạo thông tin người dùng mới
    public function createUser($name, $email, $password)
    {
        $sql = "INSERT INTO `users` ( `name`, `email`, `password`, `role`) VALUES ( :user_name, :email, :password, 1);";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":user_name" => $name,
            ":email" => $email,
            ":password" => $password,
            
        ]);
    }
   
    
}