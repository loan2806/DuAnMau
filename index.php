<?php 
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)
define('PATH_ROOT'    , __DIR__);

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';
require_once './controllers/DashboardController.php';
require_once './controllers/CategoryController.php';
require_once './controllers/AuthController.php';
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/AuthModel.php';
require_once './models/CategoryModel.php';
require_once './models/CartModel.php';

// Route
if (isset($_GET['mode']) && $_GET['mode'] == 'admin') {// kiểm tra tham số mode có tồn tại trên url hay k
    // Chỉ admin (role = 1) mới được vào
    if (empty($_SESSION['islogin']) || $_SESSION['role'] != 1) {
        header('Location: ' . BASE_URL . '?mode=auth&act=login');// điều hướng về trang đnhap
        exit();
    }
    require_once('views/admin/index.php');
} else {
    require_once('views/client/index.php');
}

//empty($_SESSION['islogin']): ktra ng dùng đã đnhap hay chưa
//$_SESSION['role'] != 1): ktra vai trò role kp là admin



// // Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

// match ($act) {
//     // Trang chủ
//     '/'=>(new ProductController())->Home(),

// };