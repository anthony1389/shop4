<?php
session_start();

// ✅ Bật thông báo lỗi để debug (xóa đi sau khi hoàn thành)
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<script language="javascript" src="kiemtra.js"></script>
<form action="" method="POST" onsubmit="return validate()">
<div class="register">
    <h1>Đăng nhập</h1>

<?php
if (isset($_POST["btn_submit"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $password == "") {
        echo "<p>Username hoặc password bạn không được để trống!</p>";
    } else {
        // ✅ Kết nối MySQL
include("../ketnoi.php");

										$conn3 = $conn;

        // ✅ Kiểm tra kết nối
        if (!$conn) {
            die("<p>Kết nối thất bại: " . mysqli_connect_error() . "</p>");
        }

        // ✅ Tránh SQL injection bằng escape đơn giản (gợi ý dùng prepared statements sau)
        $username_safe = mysqli_real_escape_string($conn, $username);
        $password_safe = mysqli_real_escape_string($conn, $password);

        // ❗ Để bảo mật, bạn nên mã hóa mật khẩu bằng MD5, SHA256 hoặc bcrypt.
        $sql = "SELECT * FROM taikhoan WHERE username = '$username_safe' AND password = '$password_safe'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo "<p>Lỗi truy vấn: " . mysqli_error($conn) . "</p>";
        } else {
            $row = mysqli_fetch_array($query);
            if (!$row) {
                echo "<p>Tên đăng nhập hoặc mật khẩu không đúng!</p>";
            } else {
                // ✅ Lưu session
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                $_SESSION['hoten'] = $row['hoten'];
                $_SESSION['diachi'] = $row['diachi'];
                $_SESSION['sdt'] = $row['sdt'];

                // ❌ Không lưu password vào session vì lý do bảo mật
                // $_SESSION['password'] = $password;

                // ✅ Đóng kết nối & chuyển hướng
                mysqli_close($conn);
                header('Location: ../index.php');
                exit(); // 🚨 Cần phải có dòng này để ngừng script ngay sau khi chuyển hướng
            }
        }
    }
}
?>

    <p>Vui lòng điền thông tin để đăng nhập</p>
    <hr>
    <label for="username"><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="Họ và tên" name="username" id="username">

    <label for="password"><b>Mật khẩu</b></label>
    <input type="password" placeholder="******" name="password" id="password">

    <hr>
    <button type="submit" name="btn_submit" class="submit">Đăng nhập</button>
</div>

<div class="register login">
    <p>Bạn chưa có tài khoản? <a href="../pages/dangky.php">Đăng ký</a>.</p>
</div>

</form>
</body>
</html>
