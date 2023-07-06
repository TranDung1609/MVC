<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span>List Post</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Post</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table ">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Tác giả</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    <?php
                    $i = 1;
                    ?>
                    <?php foreach ($_SESSION['post'] as $post) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['category_name']; ?></td>
                            <td><?php echo $post['user_name']; ?></td>
                            <td>
                                <div>
                                    <a class="btn btn-sm btn-primary" href="index.php?controller=posts&action=editPost&id=<?php echo $post['id']; ?>">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a onclick="return confirm('Bạn có muốn xoá bài viết này không?')" class="btn btn-sm btn-danger" 
                                    href="index.php?controller=posts&action=deletePost&id=<?php echo $post['id']; ?>">
                                        <i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
            <!-- {!! $product->withQueryString()->links('pagination::bootstrap-5') !!} -->
        </div>
    </div>
</div>