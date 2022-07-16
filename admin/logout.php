<?php 
	session_start();
	unset($_SESSION['username']);
	echo "<script> alert('Bạn đã đăng xuất khỏi hệ thống');</script>";
	echo "<script> window.location = 'http://localhost:8080/xdql/signin.php';</script>";
 ?>