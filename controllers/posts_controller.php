<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');
require_once('models/category.php');


class PostsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'post';
    }
    public function addPost()
    {

        $this->render('add_post');
    }
    public function index()
    {
        $this->render('list_post');
    }
    public function createPost()
    {
        $post = new Post();
        $category = new Category();
        $categories = $category->listCategory();

        if ($categories) {
            $result = $categories->fetch_assoc();
        }
        if (isset($_POST['addPost'])) {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $category_id = $_POST['category_id'];
            $user_id = $_SESSION['user']['id'];
            $created_at = date('Y-m-d');
            $image = $_POST['image'];
            $post->addPost($user_id, $category_id, $title, $body, $image, $created_at);
        }
        
    }
}
