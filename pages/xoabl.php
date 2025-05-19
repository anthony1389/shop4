<?php
		session_start();
		$id = $_GET['id'];
		include("../ketnoi.php");
		$conn3 = $conn;
		$sql= "DELETE FROM binhluan where id=$id ";
		$ketqua = mysqli_query($conn, $sql);
?>
