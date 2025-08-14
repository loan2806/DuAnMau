<?php

class CartModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllCart($cartId)
    {
        // Sử dụng INNER JOIN để chỉ lấy các sản phẩm có tồn tại trong cả hai bảng
        $sql = "
        SELECT 
            ci.id AS cart_item_id, 
            ci.quantity,
            p.id AS product_id,
            p.pro_name AS product_name, 
            p.price,
            p.img
        FROM 
            cart_item ci
        INNER JOIN 
            product p ON ci.product_id = p.id
        WHERE 
            ci.cart_id = :cartId
    ";

        // Sử dụng prepared statement để bảo mật và xử lý giá trị
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cartId', $cartId, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function add_cart($idUser, $idProduct, $quantity)
    {

        $idCart = $this->isCartUserWhereIdUser($idUser);
        $cartId = $idCart['id'];
        if (!$idCart) {
            $cartId = $this->createCart($idUser);
        }
        // if()

        $addCartItem = $this->add_cart_item($cartId, $idProduct, $quantity);
        header("Location: " . BASE_URL);
    }
    public function isCartUserWhereIdUser($id)
    {
        $sql = "SELECT id from cart where users_id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data;
    }
    public function createCart($idUser)
    {
        $sql = "INSERT INTO cart(users_id) VALUES ($idUser)";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute();
        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }
    public function add_cart_item($cartId, $productId, $quantity)
    {
        $checkCartItem = $this->isProductWhereCartItem($cartId, $productId, $quantity);
        if ($checkCartItem) {
            $quantityNew = (int)$checkCartItem['quantity'] + (int)$quantity;
            $quantityProduct = $this->getQuantityProductWhereIdProduct($productId);
            // checkLoi($quantityProduct == $quantityNew);
            $cartItemId = $checkCartItem['id'];
            if ($quantityNew <= $quantityProduct) {
                $this->updateQuantityProductWhereCartItem($cartItemId, $quantityNew);
                $_SESSION['cart'] = "Thêm giỏ hàng thành công";
            } else {
                $_SESSION['cart'] = "Thêm giỏ hàng thất bại";
            }
        } else {
            $sql = "INSERT INTO cart_item (cart_id,product_id,quantity) VALUES ($cartId,$productId,$quantity)";
            $stmt = $this->conn->prepare($sql);
            $data = $stmt->execute();
            return $data;
        }
    }
    public function isProductWhereCartItem($cartId, $productId, $quantity)
    {
        $sql = "SELECT id,product_id,quantity from cart_item where product_id = $productId AND cart_id = $cartId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }
    public function updateQuantityProductWhereCartItem($cartItemId, $quantity)
    {


        $sql = "UPDATE cart_item set quantity = $quantity where id = $cartItemId";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute();
        return $data;
    }
    public function getQuantityProductWhereIdProduct($idProduct)
    {
        $sql = "SELECT quantity from product where id=$idProduct";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data['quantity'];
    }
    // Hàm lấy thông tin 1 mục trong giỏ hàng dựa trên ID của mục đó
    public function getCartItemById($cartItemId)
    {
        // Truy vấn để lấy tất cả thông tin của một mục giỏ hàng cụ thể
        $sql = "SELECT * FROM cart_item WHERE id = $cartItemId";
        $stmt = $this->conn->query($sql);
        // Trả về dữ liệu dưới dạng mảng kết hợp
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Tăng số lượng của một sản phẩm trong giỏ hàng.
     * @param int $cartItemId ID của mục trong giỏ hàng.
     * @return bool Trả về true nếu cập nhật thành công, ngược lại là false.
     */
    public function increaseQuantity($cartItemId)
    {
        // 1. Lấy thông tin chi tiết của cart item
        $cartItem = $this->getCartItemById($cartItemId);

        // 2. Nếu không tìm thấy mục giỏ hàng, trả về false
        if (!$cartItem) {
            return false;
        }

        // 3. Lấy số lượng hiện tại của sản phẩm trong giỏ
        $currentQuantity = (int)$cartItem['quantity'];
        // Lấy ID của sản phẩm để kiểm tra số lượng tồn kho
        $productId = $cartItem['product_id'];

        // 4. Lấy số lượng tồn kho thực tế của sản phẩm
        $stockQuantity = $this->getQuantityProductWhereIdProduct($productId);

        // 5. Tính toán số lượng mới
        $newQuantity = $currentQuantity + 1;

        // 6. Kiểm tra xem số lượng mới có vượt quá số lượng tồn kho không
        if ($newQuantity <= $stockQuantity) {
            // 7. Cập nhật số lượng nếu hợp lệ, tái sử dụng hàm đã có
            return $this->updateQuantityProductWhereCartItem($cartItemId, $newQuantity);
        }

        // 8. Trả về false nếu không thể tăng vì vượt quá tồn kho
        return false;
    }

    /**
     * Giảm số lượng của một sản phẩm trong giỏ hàng.
     * @param int $cartItemId ID của mục trong giỏ hàng.
     * @return bool Trả về true nếu cập nhật thành công, ngược lại là false.
     */
    public function decreaseQuantity($cartItemId)
    {
        // 1. Lấy thông tin chi tiết của cart item
        $cartItem = $this->getCartItemById($cartItemId);

        // 2. Nếu không tìm thấy mục giỏ hàng, trả về false
        if (!$cartItem) {
            return false;
        }

        // 3. Lấy số lượng hiện tại
        $currentQuantity = (int)$cartItem['quantity'];

        // 4. Tính toán số lượng mới và kiểm tra số lượng mới có nhỏ hơn 1 không
        $newQuantity = $currentQuantity - 1;
        if ($newQuantity >= 1) {
            // 5. Cập nhật số lượng nếu hợp lệ, tái sử dụng hàm đã có
            return $this->updateQuantityProductWhereCartItem($cartItemId, $newQuantity);
        }

        // 6. Trả về false nếu không thể giảm vì số lượng đã là 0 hoặc bé hơn 0
        return false;
    }

    /**
     * Xóa một sản phẩm khỏi giỏ hàng.
     * @param int $cartItemId ID của mục trong giỏ hàng.
     * @return bool Trả về true nếu xóa thành công, ngược lại là false.
     */
    public function removeCartItem($cartItemId)
    {
        // 1. Xây dựng câu lệnh SQL để xóa mục giỏ hàng dựa trên ID
        $sql = "DELETE FROM cart_item WHERE id = $cartItemId";
        // 2. Thực thi câu lệnh và trả về kết quả
        $stmt = $this->conn->query($sql);
        return $stmt->execute();
    }
    public function getQuantityProductWhereCartId($id)
    {
        $sql = "SELECT SUM(quantity) AS total_quantity
FROM cart_item
WHERE cart_id = $id;";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['total_quantity'];
    }
}
