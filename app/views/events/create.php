<?php
$title = 'ad';
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

<h1>Thêm sự kiện</h1>
<form class="row g-3" action="/public/events/store" method="POST">
    <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
            <input type="text" class="form-control" name="name" id="validationDefault01" value="" required />
            <label for="validationDefault01" class="form-label">Tên sự kiện</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
            <label for="validationDefault02" class="form-label">Mô tả</label>
            <textarea name="description" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init style="display: flex; flex-direction: column;">
            <label for="validationDefault02" class="form-label">Loại sự kiện</label>
            <select id="type" name="type" style="width: 30%" required>
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select><br>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
            <input type="text" class="form-control" id="validationDefault02" name="start_date" value="" required />
            <label for="validationDefault02" class="form-label">Ngày bắt đầu</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
            <input type="text" class="form-control" id="validationDefault02" name="end_date" value="" required />
            <label for="validationDefault02" class="form-label">Ngày kết thúc</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
            <input type="text" class="form-control" id="validationDefault03" name="max_registration" required />
            <label for="validationDefault03" class="form-label">Số lượng</label>
        </div>
    </div>
    <div class="col-md-12">
        <button class="btn btn-primary" type="submit" data-mdb-ripple-init>Submit form</button>
    </div>
</form>






<?php
include __DIR__ . '/../layout/footer.php';
?>