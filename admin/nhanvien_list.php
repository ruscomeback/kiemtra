<?php require 'header.php';?>
  <div class="container">
  <h1> Quản lý nhân viên</h1>
  <table class="table">
  <thead class="thead-dark">
          <tr>
              <th>Mã Nhân Viên</th>
              <th>Họ Tên</th>
              <th>Ngày Sinh</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Hành động</th>
             
</tr>
</thread>
  <?php
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
$sql = " select * from nhanvien";
$result=mysqli_query($conn,$sql) or die ("câu lệnh truy vấn sai");
 while($row = mysqli_fetch_assoc($result))
 {?>
 <tr>
     <td><?php echo $row['MaNV'];?></td>
     <td><?php echo $row['Hoten'];?></td>
     <td><?php echo $row['Ngaysinh'];?></td>
     <td><?php echo "0".$row['SDT'];?></td>
     <td><?php echo $row['Diachi'];?></td>
     <td><button class="btn btn-primary" onclick="window.location.href='sua_nhanvien.php?MaNV=<?php echo $row['MaNV']?>'"><i class="fas fa-pen"></i></button> 
     <button class="btn btn-danger" onclick="window.location.href='xoa_nv.php?x=<?php echo $row['MaNV']?>'"><i class="fas fa-trash"></i></button></td>
  </tr>
 <?php
 }
 ?>
 <table>
     <a href="add_nv.php"class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Thêm mới</a>
</div>
<?php
  require 'footer.php'; 
  ?>