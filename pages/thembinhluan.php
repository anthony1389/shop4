
<?php
session_start();
if (!isset($_SESSION['username'])) {
    
}
?><?php
include("../ketnoi.php");
		$conn3 = $conn;
    $noidung = $_POST['noidung'];
    $username = $_SESSION['username'];
    $idsp = $_POST['idsp'];
    
    
    echo $noidung.'-'.$username.'-'.$idsp;

    $sql = "INSERT INTO binhluan( noidung, username, idsp) VALUES ('$noidung','$username',$idsp)";
    $ketqua = mysqli_query($conn, $sql);
    echo $sql;
    echo "OK";
   
?>
