<?php

$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new DashboardController())->Dashboard(),
    'category'=>(new CategoryController())->showCategory(),
    'edit_category'=>(new CategoryController())->haldleEditCategory(),
    'update_category'=>(new CategoryController())->haldleUpdateCategory(),
    'them-danh-muc'=>(new CategoryController())->AddControllerView(),
    'delete_category'=>(new CategoryController())->haldleDeleteCategory(),
    'list_product'=>(new ProductController())->Home(),
    'detail_product'=>(new ProductController())->Productdetail($_GET['id']),
    'add_product'=>(new ProductController())->Addproduct(),


};
?>
<!-- haldle -->