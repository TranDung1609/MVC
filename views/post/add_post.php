
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/ </span> Add Post </h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="index.php?controller=posts&action=createPost" method="POST" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="basic-default-title" placeholder="Tên" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-price">Ảnh</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="file" id="basic-default-image" name="image" class="form-control" multiple />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-desc">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea name="body" class="form-control" id="basic-default-body" rows="5" placeholder="Body"></textarea>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-desc">Tác giả</label>
                            <div class="col-sm-10">
                                <select name="user_id" class="form-control input-sm m-bot15" >
                                    <option value="1">Dung</option>
                                    <option value="2">Manh</option>
                                    <option value="3">Tran</option>
                                </select>
                            </div>
                        </div> -->


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-desc">Danh mục</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control ">

                                    <?php
                                            foreach ($_SESSION['categoryPost'] as $cate) {
                                            ?>
                                        <option value="<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button name="addPost" type="submit" class="btn btn-success">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>