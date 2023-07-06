<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> List Users</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table User</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                        $i = 1;
                        foreach ($_SESSION['listUser'] as $user) {
                        ?> <tr>
                        <td><?php echo $i++; ?></td>
                        <!-- <td><?php echo $user['id'] ?></td> -->
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                            <div>
                                <a class="btn btn-sm btn-primary" href="index.php?controller=users&action=editUser&id=<?php echo $user['id']; ?>">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a onclick="return confirm('Bạn có muốn xoá user này không?')" class="btn btn-sm btn-danger" 
                                href="index.php?controller=users&action=deleteUser&id=<?php echo $user['id']; ?>">
                                    <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>