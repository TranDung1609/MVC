<?php
require_once('controllers/base_controller.php');
require_once('models/user.php');


class AuthController extends BaseController
{
	function __construct()
	{
		$this->folder = 'auth';
	}
	public function register()
	{
		$this->render('register');
	}
	public function login()
	{
		$this->render('login');
	}
	public function singUp()
	{
		$user = new User();
		$name = $email = $password = NULL;
		$error = array();
		$error['name'] = $error['email'] = $error['password']  = NULL;
		if (isset($_POST['regis'])) {
			if (empty($_POST['name'])) {
				$error['name'] = '* Cần điền tên đăng nhập';
			} else {
				$name = $_POST['name'];
			}
			if (empty($_POST['email'])) {
				$error['email'] = '* Cần điền email';
			} else {
				$email = $_POST['email'];
			}

			if (empty($_POST['password'])) {
				$error['password'] = '* Cần điền mật khẩu';
			} else {
				$password = md5($_POST['password']);
			}

			if ($name && $password && $email) {
				$check = $user->checkExists($name, $email);

				if ($check->num_rows > 0) {
					$error['name_exist'] = '* Tên đăng nhập đã bị trùng';
				} else {

					$user->register($name, $email, $password);
					echo "<script>alert('đăng ký thành công')</script>";

					header('Location: login.php');
				}
			}
		}
	}

	public function signIn()
	{
		$user = new User();
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			if (empty($_POST['email']) || empty($_POST['password'])) {

				header('Location: register.php');
			}
			if ($email) {
				$result = $user->login($email, $password);
				$check = $result->num_rows;
				
				if ($check > 0) {
					$data = $result->fetch_array(); /*lấy dữ liệu tương ứng với username và password nhập*/
					$_SESSION['user'] = $data; /*lưu session*/
					
					header('Location: index.php');
				} else {
					header('Location: login.php');
				}
				
				// if (mysqli_num_rows($result)) {

				// 	while ($row = mysqli_fetch_array($result)) {

				// 		$id = $row['id'];
				// 		$name = $row['name'];
				// 		$email = $row['email'];
				// 		$password = $row['password'];
				// 	}

				// 	if (password_verify($password_input, $password)) {
				// 		$_SESSION['id'] = $id;

				// 		header('location: index.php');

				// 	} else {


				// 	}
				// }
			}
			
		}
		
	}
}
