<?php require_once('models/category.php'); ?>
<?php $cate = new Category(); 

?>
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Category</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Category</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tbody class="table-border-bottom-0">
                    <?php
                    $show_cate = $cate->listCategory();
                    if ($show_cate) {
                        $i = 0;
                        while ($result = $show_cate->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $result['id'] ?></td>
                                <td><?php echo $result['name'] ?></td>
                                <td><?php
                                    if ($result['status'] == 1) {
                                        echo "Ẩn";
                                    } else {
                                        echo "Hiển thị";
                                    }
                                    ?></td>
                                <td>
                                    <div>
                                        <a class="btn btn-sm btn-primary" href="index.php?controller=categories&action=editCategory&id=<?php echo $result['id']; ?>">
                                            <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a onclick="return confirm('Bạn có muốn xoá category này không?')" class="btn btn-sm btn-danger" 
                                        href="index.php?controller=categories&action=deleteCategory&id=<?php echo $result['id']; ?>">
                                            <i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>