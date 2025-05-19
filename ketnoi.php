<?php
$servername = "datashop.mysql.database.azure.com";
$username = "sqladmin";
$password = "phong218.";
$dbname = "dacs2";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

echo "";
?>
