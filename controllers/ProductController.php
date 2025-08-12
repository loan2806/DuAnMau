<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $product = $this->modelProduct->getAllProduct();
        require_once './views/admin/product/list_product.php';
    }
    public function Productdetail($id){
        $product = $this->modelProduct->getOneProductById($id);
       
        require_once './views/admin/product/detail_product.php';

    }
    public function Addproduct(){
        $danhmuc = ( new CategoryModel)->danhsach();
        require_once './views/admin/product/add_product.php';
    }
}
