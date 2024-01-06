<?php
include 'connect_db.php';

// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn để lấy thông tin người liên hệ dựa trên id
    $query = "SELECT * FROM lienhe WHERE id = $id";
    $result = $conn->query($query);

    // Kiểm tra xem có dòng dữ liệu được trả về hay không
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Lấy thông tin từ dòng dữ liệu
        $ten_kh = $row['ten_kh'];
        $ten_dv = $row['ten_dv'];
        $sdt = $row['sdt'];
        $note = $row['note'];
        $trangthai = $row['trangthai'];

        // Kiểm tra xem có thực hiện cập nhật thông tin không
        if (isset($_POST['update'])) {
            $ten_kh_new = $_POST['ten_kh'];
            $ten_dv_new = $_POST['ten_dv'];
            $sdt_new = $_POST['sdt'];
            $note_new = $_POST['note'];
            $trangthai_new = $_POST['trangthai'];

            // Cập nhật thông tin người liên hệ vào CSDL
            $updateQuery = "UPDATE lienhe SET ten_kh = '$ten_kh_new', ten_dv = '$ten_dv_new', sdt = '$sdt_new', note = '$note_new', trangthai = '$trangthai_new' WHERE id = $id";
            $conn->query($updateQuery);

            // Chuyển hướng về trang danh sách người liên hệ
            header("Location: managerlienhe.php");
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sửa Thông Tin Liên Hệ</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f2f2f2;
                    margin: 0;
                    padding: 20px;
                }

                h1 {
                    color: #333;
                }

                form {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                label {
                    display: block;
                    margin-bottom: 10px;
                    font-weight: bold;
                }

                input[type="text"],
                textarea {
                    width: 50%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 16px;
                }

                textarea {
                    height: 100px;
                }

                input[type="submit"] {
                    background-color: #4caf50;
                    color: #fff;
                    border: none;
                    padding: 10px 20px;
                    font-size: 16px;
                    border-radius: 5px;
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }

                .error {
                    color: red;
                    font-size: 14px;
                    margin-top: 5px;
                }
            </style>
        </head>

        <body >
            <h1>Sửa Thông Tin Liên Hệ</h1>
            <form method="POST" action="">
                <label for="ten_kh">Tên khách hàng:</label>
                <input type="text" name="ten_kh" value="<?php echo $ten_kh; ?>" readonly><br><br>
                <label for="ten_dv">Dịch vụ:</label>
                <input type="text" name="ten_dv" value="<?php echo $ten_dv; ?>"><br><br>
                <label for="sdt">Số điện thoại:</label>
                <input type="text" name="sdt" value="<?php echo $sdt; ?>"><br><br>
                <label for="note">Ghi chú:</label>
                <textarea name="note"><?php echo $note; ?></textarea><br><br>
                <label for="trangthai">Trạng thái:</label>
                <input type="text" name="trangthai" value="<?php echo $trangthai; ?>"><br><br>
                <input type="submit" name="update" value="Cập nhật">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "Không tìm thấy người liên hệ có ID = $id";
    }
} else {
    echo "Không có tham số ID được truyền vào.";
}

// Đóng kết nối
$conn->close();
?>