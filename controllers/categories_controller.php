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
                $this->render('list_category');
            }else {
                $this->render('add_category');
            }
        }

        
    }
    public function editCategory()
    {
        // $category = (new Category())->getCategory($id);
        $this->render('edit_category');
    }

    // public function updateCategory()
    // {
    //     $this->render('list_category');
    // }

    public function deleteCategory(){
        $category = new Category();
		
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$category->deleteCategory($id);

			header('Location: ?controller=categories&action=index');
		}
		$this->render('list_category');
    }
}
