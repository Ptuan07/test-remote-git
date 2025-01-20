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
    <h2 style="text-align: center; margin-bottom: 20px;">Danh sách sự kiện</h2>
    <a href="/public/events/create" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm sự kiện</a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Mô tả</th>
                <th>Loại</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Số lượng vé</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $event['id'] ?></td>
                <td><?= $event['name'] ?></td>
                <td><?= $event['description'] ?></td>
                <td><?= $event['type'] ?></td>
                <td><?= $event['start_date'] ?></td>
                <td><?= $event['end_date'] ?></td>
                <td><?= $event['max_registration'] ?></td>
                <td>
                    <a href="/public/events/edit/<?= $event['id'] ?>">Edit</a>
                    <a href="/public/events/delete/<?= $event['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<?php
include __DIR__ . '/../layout/footer.php';
?>