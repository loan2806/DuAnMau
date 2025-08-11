<?php
// có class chứa các function thực thi xử lý logic 
class DashboardController
{
    // public $modelProduct;

    // public function __construct()
    // {
    //     $this->modelProduct = new ProductModel();
    // }

    public function Dashboard()
    {
        
        require_once './views/admin/main.php';
    }
}
