<?php
$mamt=$_GET['x'];
$cn=mysqli_connect('localhost','root',"",'quanlythuvien')or die("Kết nối database không thành công");
$sql="update muontra set Trangthai='Đã trả' where Mamuontra='$mamt'";
$ketqua=mysqli_query($cn, $sql) or die("Câu truy vấn sai!");
if($ketqua==true)
{
    echo "<script> alert('Xác nhận trả sách');</script>";
     header("Location:http://localhost:8080/xdql/admin/ds_muontra.php");
}
?>