<?php
		session_start();
		$id = $_GET['id'];
		include("../ketnoi.php");
										$conn3 = $conn;
		$sql= "DELETE FROM sanpham where id=$id ";
		$ketqua = mysqli_query($conn, $sql);
		header("location: ../sanpham/quanlysp.php");
		
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
?>
</body>
</html>
