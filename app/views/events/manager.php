<?php
$title = 'Dashboard';
include __DIR__ . '/../layout/header.php';
?>

<div class="container">
    <h2 style="text-align: center; margin-bottom: 20px;">Danh sách đơn xuất</h2>
    <a href="/public/events/create" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Tạo đơn
        xuất</a>
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
                    <a href="/public/events/edit?id=<?= $event['id'] ?>">Edit</a>
                    <a href="/public/events/delete?id=<?= $event['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<?php
include __DIR__ . '/../layout/footer.php';
?>