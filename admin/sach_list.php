<?php require 'header.php'; ?>

<div class="container mt-3">
  <h1> Quản lý sách</h1>
  <table class="table table-hover">
  <thead class="thead-dark">
<tr>
    <th>Mã Sách</th>
    <th>Tên Sách</th>
    <th>Hình ảnh</th>
    <th>Tác giả</th>
    <th>Thể loại</th>
    <th>Nhà xuất bản</th>
    <th>Năm xuất bản</th>
    <th>Hành Động</th>
</tr>
</thread>
  <?php
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
$sql = " select * from sach";
$result=mysqli_query($conn,"SELECT sach.*,theloai.tentheloai AS Tentheloai FROM sach JOIN theloai ON sach.Matheloai = theloai.id;") or die ("câu lệnh truy vấn sai"); 
 while($row = mysqli_fetch_assoc($result))
 {?>
 <tr>
     <td><?php echo $row['Masach'];?></td>
     <td><?php echo $row['Tensach'];?></td>
     <td><img src="image/<?php echo $row['Hinhanh']?>" width="60" height="50"></td>
     <td><?php echo $row['Tacgia'];?></td>
     <td><?php echo $row['Tentheloai'];?></td>
     <td><?php echo $row['NXB'];?></td>
     <td><?php echo $row['Namxuatban'];?></td>
     <td><button class="btn btn-primary" onclick="window.location.href='sua_sach.php?Masach=<?php echo $row['Masach']?>'"> <i class="fas fa-pen"></i></button>
     <button class="btn btn-danger" onclick="window.location.href='xoa_sach.php?x=<?php echo $row['Masach']?>&&hinhanh=<?php echo $row['Hinhanh']?>'"><i class="fas fa-trash"></i></button></td>
  </tr>
 <?php
 }
 ?>
 <table>
     <a href="add_sach.php"class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Thêm mới sách</a>
</div>
<?php require 'footer.php'; ?>