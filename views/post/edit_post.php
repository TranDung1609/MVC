<?php require_once(__DIR__ . '/../helpers.php'); ?>


<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Post</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    <?php
                    foreach ($_SESSION['editPost'] as $result) {
                    ?>
                        <form role="form" action="index.php?controller=posts&action=updatePost&id=<?php echo $result['id']; ?>" method="POST" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tiêu đề</label>
                                <div class="col-sm-10">
                                <textarea name="title" class="form-control"  rows="1" placeholder="Title"><?php echo $result['title']; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="">Ảnh cũ</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="hide" id="" value="<?php echo $result['image']; ?>" name="imageOld" class="form-control" multiple />
                                    </div>
                                    <div>
                                        <img src="<?= base_url('assets/uploads/' . $result['image']) ?>" style="width: 70px; heigh: 70px" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-price">Ảnh Mới</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="basic-default-image" name="image" class="form-control" multiple />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-body">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea name="body" class="form-control" id="basic-default-body" rows="5" placeholder="Mô tả"><?php echo $result['body']; ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-desc">Danh mục</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">

                                        <?php
                                        foreach ($_SESSION['catePost'] as $category) { ?>
                                            <option <?php if ($category['id'] == $result['category_id']) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $category['id'] ?>">
                                                <?php echo $category['name'] ?>
                                            </option>
                                        <?php }
                                        ?>

                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button name="editPost" type="submit" class="btn btn-success">Send</button>
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