<?php require_once('models/category.php'); ?>
<?php $cate = new Category();
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location= 'list_category.php'</script>";
} else {
    $id = $_GET['id'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $update_cate = $cate->editCate($name, $status, $id);
}
?>
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form role="form" action="" method="POST" >
                        <?php
                        
                        $get_cate = $cate->getCategory($id);
                        if ($get_cate) {
                            while ($result = $get_cate->fetch_assoc()) {
                            var_dump($result['status'] == 2);
                        ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $result['name'];?>" name="name" id="basic-default-name" placeholder="Tên" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                                    <div class="col-sm-10">
                                        <select value="" name="status" class="form-control input-sm m-bot15">
                                            <option <?php $result['status'] == 1  ?> value="1">Ẩn</option>
                                            <option <?php $result['status'] == 2 ?" selected" : ""  ?> value="2">Hiển thị</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                    <button name="editCategory" type="submit" class="btn btn-success">Send</button>
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