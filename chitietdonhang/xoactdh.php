<?php
		session_start();
include("ketnoi.php");
										$conn3 = $conn;
		$id = $_GET['id'];

		$sql= "DELETE FROM chitietdonhang where id=$id ";
		$ketqua = mysqli_query($conn, $sql);
		header("location: ../chitietdonhang/quanlyctdh.php");
		
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
