<?php
include 'connect_db.php';

if (isset($_GET['id'])) {
  $user_id = $_GET['id'];

  // Thực hiện truy vấn để xóa người dùng
  $query = "DELETE FROM user_form WHERE id=$user_id";

  if (mysqli_query($conn, $query)) {
    echo "Xóa người dùng thành công!";
    header("refresh:1;url=manageruser.php");
  } else {
    echo "Lỗi: " . mysqli_error($conn);
  }
} else {
  echo 'Không có ID người dùng được cung cấp.';
}

// Đóng kết nối
$conn->close();
?>
