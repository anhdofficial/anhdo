<?php
include 'connect_db.php';

// Kiểm tra nếu có id được truyền vào
if (isset($_GET['id'])) {
    $hoaDonId = $_GET['id'];

    // Thực hiện truy vấn xóa
    $query = "DELETE FROM hoadon WHERE id = $hoaDonId";

    if (mysqli_query($conn, $query)) {
        echo "Xóa tour thành công!";
        // Chuyển hướng về trang admin sau khi xóa
        echo "<script>
        setTimeout(function() {
            window.location.href = 'managerbill.php';
        }, 1000);
    </script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Không có thông tin tour.";
}
?>
