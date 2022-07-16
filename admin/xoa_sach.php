<?php
$masach=$_GET['x'];
$file_name=$_GET['hinhanh'];
$cn=mysqli_connect('localhost','root',"",'quanlythuvien')or die("Kết nối database không thành công");
$sql="delete from sach where Masach='$masach'";
$ketqua=mysqli_query($cn, $sql) or die("Câu truy vấn sai!");
if($ketqua==true)
{
     if($file_name!='')
     unlink("image/".$file_name);
     header("Location:http://localhost:8080/xdql/admin/ql_sach.php");
}
?>