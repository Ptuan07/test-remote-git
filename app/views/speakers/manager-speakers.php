<?php
$title = 'Dashboard';
include __DIR__ . '/../layout/header.php';
?>
<style>
    .form-outline {
        width: 50%;
        margin: 0 auto;
    }

    .btn {
        margin-left: 432px;
    }

    .row.g-3 {
        flex-direction: column;
        align-items: center;
    }

    .sidebar {
        left: 0;
        top: 0;
    }

    .sidebar .nav-links {
        margin-top: 10px;
        padding-left: 0px;
    }
</style>
<div class="container">
    <h2 style="text-align: center; margin-bottom: 20px;">Danh sách diễn giả</h2>
    <a href="/public/speakers/create" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Tạo thông tin diễn giả</a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên diễn giả</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Chức vụ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php foreach ($speakers as $speaker): ?>
            <tr>
                <td><?= $speaker['id'] ?></td>
                <td><?= $speaker['name'] ?></td>
                <td><?= $speaker['email'] ?></td>
                <td><?= $speaker['phone'] ?></td>
                <td><?= $speaker['title'] ?></td>

                <td>
                    <a href="/public/speakers/edit/<?= $speaker['id'] ?>">Edit</a>
                    <a href="/public/speakers/delete/<?= $speaker['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<?php
include __DIR__ . '/../layout/footer.php';
?>