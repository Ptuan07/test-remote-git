</div>
</section>
<script>
    document.getElementById("profile_image").addEventListener("change", function (event) {
    const file = event.target.files[0]; // Lấy file từ input
    const previewImg = document.getElementById("imagePreviewImg");
    const placeholder = document.getElementById("imagePlaceholder");

    if (file) {
        const reader = new FileReader();

        // Khi file được đọc xong, cập nhật ảnh preview
        reader.onload = function (e) {
            previewImg.src = e.target.result;
            previewImg.style.display = "block"; // Hiển thị ảnh
            placeholder.style.display = "none"; // Ẩn khoảng trống
        };

        reader.readAsDataURL(file);
    } else {
        previewImg.style.display = "none"; // Ẩn ảnh nếu không chọn file
        placeholder.style.display = "block"; // Hiển thị khoảng trống
    }
});

</script>
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable(); // Khởi tạo DataTables
    });
</script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>

<script>
    CKEDITOR.replace('editor1');
</script>
<script>
        $(document).ready(function () {
            $('#datetime').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i", 
                minDate: "today", 
            });
        });
    </script>
</body>

</html>