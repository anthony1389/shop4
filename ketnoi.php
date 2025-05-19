<?php
$servername = "datashop.mysql.database.azure.com";
$username = "sqladmin";
$password = "phong218.";
$dbname = "dacs2";

// Đường dẫn đến chứng chỉ SSL đã tải về
$ssl_ca = __DIR__ . "/cert/BaltimoreCyberTrustRoot.crt.pem";  // Đảm bảo đường dẫn đúng

// Tạo kết nối MySQL với SSL
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Cấu hình SSL cho kết nối
if (!$conn->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL)) {
    die("Không thể thiết lập SSL");
}

// Kết nối thực sự sẽ được sử dụng với SSL
if (!$conn->real_connect($servername, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die("Kết nối với SSL thất bại: " . mysqli_connect_error());
}

// Nếu kết nối thành công
echo "Kết nối SSL thành công!";
?>
