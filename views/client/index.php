<?php

$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new ProductController())->Home(),
    'login'=>(new AuthController())->login(),
    'register'=>(new AuthController())->register(),
    'logout'=>(new AuthController())->logout(),
    

};

?>