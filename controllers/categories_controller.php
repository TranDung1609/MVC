<?php
require_once('controllers/base_controller.php');
require_once('models/category.php');

class CategoriesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'category';
    }
    public function index()
    { 
        $category = new Category();
        $categories = $category->listCategory();
        $_SESSION['listCategory'] = $categories;
        $this->render('list_category');
    }
    public function addCate()
    {
        $this->render('add_category');
    }
    public function addCategory()
    {
        $newCategory = new category();
        $name = $status = NULL;
        $alert = array();
        if (isset($_POST['addCategory'])) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            if ($name && $status) {
                $newCategory->insertCategory($name, $status);
                $alert['success'] = 'Thêm thành công';
                header('location: index.php?controller=categories&action=index');
            }else {
                $this->render('add_category');
            }
        } 
    }
    public function editCategory()
    {
        $category = new Category();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $category->getCategory($id);
            $_SESSION['editCategory'] = $data;
            $this->render('edit_category');
        } else {
            $this->render('list_category');
        }
    } 
    public function updateCategory()
    {
        $category = new Category;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['editCategory'])) {
                $name = $_POST['name'];
                $status = $_POST['status'];
                $category->editCate($id, $name, $status);
                header('location: index.php?controller=categories&action=index');
            } 
        }
    }
    public function deleteCategory()
    {
        $category = new Category();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$category->deleteCategory($id);
			header('Location: ?controller=categories&action=index');
		}
    }
}
