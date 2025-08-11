<?php
// có class chứa các function thực thi xử lý logic 
class CategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
    }
    public function showCategory()
    {
        $category = $this->modelCategory->danhsach();
        // var_dump($category);
        // die();
        views('views/admin/category/list_category', ['category' => $category]);
    }

    public function AddControllerView()
    {
        //Kiểm tra phương thức của url
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo "khong vui";
            print_r($_POST);
        } else {
            $title = "Thêm danh mục";
            require_once './views/admin/addcategory.php';
        }
    }
    public function haldleEditCategory()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $category = $this->modelCategory->getOneCategoryById($id);
            views('views/admin/category/edit_category', ['category' => $category]);
            die();
        } else {
            echo "Khong tim thay danh muc";
        }
    }
    public function haldleDeleteCategory()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $category = $this->modelCategory->deleteCategory($id);
         header('Location: ' . BASE_URL . '?mode=admin&act=category');
            exit;
        } else {
            echo "Khong tim thay danh muc";
        }
    }
    public function haldleUpdateCategory()
    {

        $id = $_POST['id'] ?? null;
        $cat_name = $_POST['cat_name'];
        // checkLoi($cat_name);
        if (empty($cat_name)) {
            echo "Ko cos name";
        }

        if ($id) {
            $category = $this->modelCategory->updateCategory($id, $cat_name);
            // checkLoi($category);
            header('Location: ' . BASE_URL . '?mode=admin&act=category');
            exit;
        } else {
            echo "Khong tim thay danh muc";
        }
    }
}
