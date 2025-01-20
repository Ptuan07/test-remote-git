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


    <div class="wrapper">

        <!-- COMPANY INFORMATION -->
        <div class="company-info">
            <h3>Avatar</h3>
            <div class="upload-section">
                <div class="image-preview" id="imagePreview">
                    <img src="" alt="Image Preview" id="imagePreviewImg"
                        style="display: none; max-width: 100%; height: auto;" />
                </div>

              
            </div>
        </div>
        <!-- End .company-info -->

        <!-- CONTACT FORM -->
        <div class="contact">
            <h3>Thông tin diễn giả</h3>

            <form id="contact-form" action="/public/speakers/store" method="POST" enctype="multipart/form-data">

                <p>
                    <label>Name</label>
                    <input type="text" name="name" id="name" required>
                </p>

                <p>
                    <label>Email</label>
                    <input type="email" id="email" name="email">
                </p>

                <p>
                    <label>Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </p>

                <p>
                    <label>Title</label>
                    <input type="text" id="title" name="title">
                </p>

                <p class="full">
                    <label>Bio</label>
                    <textarea name="bio" rows="5" id="editor1" value=""></textarea>
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