<?php require_once('models/user.php'); ?>
<?php $user = new User();
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location= 'list_user.php'</script>";
} else {
    $id = $_GET['id'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $update_cate = $user->editUser($name, $email, $id);
}
?>
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit User</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form role="form" action="" method="POST">
                        <?php
                        $get_user = $user->getUser($id);
                        if ($get_user) {
                            while ($result = $get_user->fetch_assoc()) {
                        ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $result['name']; ?>" name="name" id="basic-default-name" placeholder="Tên"  />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" value="<?php echo $result['email']; ?>" name="email" class="form-control" placeholder="abc@gmail.com"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">PassWord</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" value="<?php echo $result['password']; ?>" name="password" id="basic-default-name" placeholder="Mật khẩu" readonly />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>