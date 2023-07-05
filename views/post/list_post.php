<?php include(__DIR__ . '/../dashboard/header.php') ?>
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span>List Post</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Post</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Tác giả</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    
                    <tr>
                        <td>1</td>
                        <td>xin chao</td>
                        <td>Việt Nam</td>
                        <td>dung</td>
                        <td>
                            <div>
                                <a class="btn btn-sm btn-primary" href="">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a onclick="return confirm('Bạn có muốn xoá bài viết này không?')" class="btn btn-sm btn-danger" href="">
                                    <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- {!! $product->withQueryString()->links('pagination::bootstrap-5') !!} -->
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../dashboard/footer.php') ?>