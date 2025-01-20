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

    .upload-section {
        margin-top: 20px;
        text-align: center;
    }

    .image-preview {
        margin: 0 auto;
        width: 200px;
        height: 200px;
        position: relative;
    }

    .image-preview img {
        border-radius: 5px;
        object-fit: cover;
    }
</style>

<div class="container">

    <h1 class="brand"><span>Phoenix Web Design</span></h1>

    <div class="wrapper">

        <!-- COMPANY INFORMATION -->
        <div class="company-info">
            <h3>Avatar</h3>
            <div class="upload-section">
                <div class="image-preview" id="imagePreview">
                    <!-- Khi chưa có ảnh sẽ hiển thị khoảng trống -->
                    <?php if (!empty($speaker['profile_image'])): ?>
                        <img src="/public/assets/images/speakers/<?= $speaker['profile_image'] ?>" alt="Profile Image"id="imagePreviewImg"/>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
        <!-- End .company-info -->

        <!-- CONTACT FORM -->
        <div class="contact">
            <h3>E-mail Us</h3>

            <form id="contact-form" action="/public/speakers/update/<?= $speaker['id'] ?>" method="POST"
                enctype="multipart/form-data">

                <p>
                    <label>Name</label>
                    <input type="text" name="name" id="name" value="<?= $speaker['name'] ?>" required>
                </p>

                <p>
                    <label>Email</label>
                    <input type="email" id="email" name="email" value="<?= $speaker['email'] ?>">
                </p>

                <p>
                    <label>Phone</label>
                    <input type="text" id="phone" name="phone" value="<?= $speaker['phone'] ?>" required>
                </p>

                <p>
                    <label>Title</label>
                    <input type="text" id="title" name="title" value="<?= $speaker['title'] ?>">
                </p>

                <p class="full">
                    <label>Bio</label>
                    <textarea name="bio" rows="5" id="editor1"
                        value=""><?= $speaker['bio'] ?></textarea>
                </p>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" style="margin-top: 10px;" />
                <p class="full">
                    <button type="submit">Submit</button>
                </p>

            </form>
            <!-- End #contact-form -->
        </div>
        <!-- End .contact -->

    </div>
    <!-- End .wrapper -->
</div>
<!-- End .container -->





<?php
include __DIR__ . '/../layout/footer.php';
?>