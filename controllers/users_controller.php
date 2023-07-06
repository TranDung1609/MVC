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
        $user = new User();
        $users = $user->listUser();
        $_SESSION['listUser'] = $users;
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
                header('location: index.php?controller=users&action=index');
            } else {
                $this->render('add_user');
            }
        }
    }

    public function editUser()
    {
        $user = new User();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $user->getUser($id);
            $_SESSION['editUser'] = $data;
            $this->render('edit_user');
        } else {
            $this->render('list_user');
        } 
    }
    public function updateUser()
    {
        $user = new User();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (isset($_POST['editUser'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $user->editUser($id, $name, $email);
                header('location: index.php?controller=users&action=index');
            }
        }
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
