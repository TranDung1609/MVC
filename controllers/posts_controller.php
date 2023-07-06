<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');
require_once('models/category.php');
class PostsController extends BaseController
{
    protected $db;
    function __construct()
    {
        $this->folder = 'post';
    }
    public function addPost()
    {
        $cate = new Category();
        $data = $cate->listCategory();
        $_SESSION['categoryPost'] = $data;
        $this->render('add_post');
    }
    public function index()
    {
        $post = new Post();
        $posts = $post->listPost();
        $_SESSION['post'] = $posts;
        $this->render('list_post');
    }
    public function create()
    {
        $post = new Post();
        $category = new Category();
        $categories = $category->listCategory();

        // if ($categories) {
        //     $result = $categories->fetch_assoc();
        // }
        if (isset($_POST['addPost'])) {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $category_id = $_POST['category_id'];
            $user_id = $_SESSION['user']['id'];
            $created_at = date('Y-m-d H:i:s');

            $image = basename($_FILES['image']['name']);
            //upload file
            // $target_dir = "assets/uploads/";
            // $target_file = $target_dir . $image;
            // if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

            //     $this->render('list_post');
            // }else{
            //     $this->render('add_post');
            // }
            if ($title && $body && $category_id && $user_id && $image && $created_at) {
                $post->addPost($user_id, $category_id, $title, $body, $image, $created_at);


                $this->render('list_post');
            } else {
                $this->render('add_post');
            }
        }
    }
    public function createPost()
    {
        $post = new Post();
        $category = new Category();
        $categories = $category->listCategory();

        if (isset($_POST['addPost'])) {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $category_id = $_POST['category_id'];
            $user_id = $_SESSION['user']['id'];
            $created_at = date('Y-m-d H:i:s');

            $image = time() . basename($_FILES['image']['name']);
            //upload file
            $target_dir = "/assets/uploads/";
            $target_file = $target_dir . $image;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES["image"]["size"] > 500000) {
                echo "Sorry, your file is too large ";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $this->render('add_post');
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], SITE_ROOT . $target_file)) {
                    $post->addPost($user_id, $category_id, $title, $body, $image, $created_at);

                    header('location: index.php?controller=posts&action=index');
                } else {

                    $this->render('add_post');
                }
            }
        }
    }
    public function editPost()
    {
        $category = new Category();
        $post = new Post();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $post->getPost($id);
            $result = $category->listCategory();
            $_SESSION['editPost'] = $data;
            $_SESSION['catePost'] = $result;
            $this->render('edit_post');
        } else {
            $this->render('list_post');
        } 
    }
    public function deletePost()
    {
        $post = new Post();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post->delPost($id);

            header('Location: ?controller=posts&action=index');
        }
        $this->render('list_post');
    }
    public function updatePost()
    {
        $post = new Post();
       
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // $categories = $category->categoryList(); /*lấy toàn bộ chuyên mục trong bảng categories*/

            if (isset($_POST['editPost'])) {
                $category_id = $_POST['category_id'];
                $title = $_POST['title'];
                $body = $_POST['body'];
                
                if (isset($_FILES['image']) && $_FILES['image']['error'] > 0) {
                    $image = $_POST['imageOld'];
                } else {
                    $image = time() . basename($_FILES['image']['name']);
                    //upload file
                    $target_dir = "/assets/uploads/";
                    $target_file = $target_dir . $image;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if ($_FILES["image"]["size"] > 500000) {
                        echo "Sorry, your file is too large ";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                        $this->render('add_post');
                        echo "Sorry, your file was not uploaded.";
                    } else {
                        move_uploaded_file($_FILES['image']['tmp_name'], SITE_ROOT . $target_file);
                    }
                }

                $post->editPost($id, $category_id, $title, $body, $image);
                 header('location: index.php?controller=posts&action=index');
            }         
        }   
    }
}
