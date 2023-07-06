<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit User</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                    foreach ($_SESSION['editUser'] as $result) {
                    ?>
                        <form role="form" action="index.php?controller=users&action=updateUser&id=<?php echo $result['id']; ?>" method="POST">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $result['name']; ?>" name="name" id="basic-default-name" placeholder="Tên" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="basic-default-email" value="<?php echo $result['email']; ?>" name="email" class="form-control" placeholder="abc@gmail.com" />
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
                                    <button name="editUser" type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>

                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>