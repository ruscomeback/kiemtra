<?php
$manv=$_GET['x'];
$cn=mysqli_connect('localhost','root',"",'quanlythuvien')or die("Kết nối database không thành công");
$sql="delete from nhanvien where MaNV='$manv'";
$ketqua=mysqli_query($cn, $sql) or die("Câu truy vấn sai!");
if($ketqua==true)
{
     header("Location:http://localhost:8080/xdql/admin/nhanvien_list.php");
}
?>