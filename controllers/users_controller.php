<?php
require_once('controllers/base_controller.php');
require_once('models/user.php');


class UsersController extends BaseController
{
    function __construct()
    {
        $this->folder = 'user';
    }
    public function index()
    {
        $this->render('list_user');
    }
    public function addUser()
    {
        $this->render('add_user');
    }

    public function create()
    {
        $user = new User();
        $name = $email = $password = NULL;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if ($name) {
                $user->register($name, $email, $password);
                $alert['success'] = 'Thêm thành công';
                $this->render('list_user');
            } else {
                $this->render('add_user');
            }
        }
    }

    public function editUser()
    {
        $this->render('edit_user');
    }

    public function deleteUser()
    {
        $user = new User();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user->deleteUser($id);
            header('Location: index.php?controller=users&action=index');
        }
        $this->render('list_user');
    }
}
