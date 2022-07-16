<?php require 'header.php';?>
<div class="container"> 
  <h1> Danh sách người dùng</h1>
  <!-- <a href="add_user.php"class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Thêm mới</a> -->
    <table class="table">
     <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>User</th>
            <th>Password</th>
            <th>Họ và tên</th>
            <th>Ghi chú</th>
            <th>Hoạt động</th>
        </tr>
      </thread>
<?php
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
$sql = " select * from danhsachuser";
$result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
$s=0;
   while($row = mysqli_fetch_assoc($result)){
?>
   <tr> 
       <td><?php echo $s+=1;?></td>
       <td><?php echo $row['username'];?></td>
       <td><?php echo $row['password'];?></td>
       <td><?php echo $row['Hoten'];?></td>
       <td><?php echo $row['ghichu'];?></td>
       <td ><button class="btn btn-danger" onclick="window.location.href='xoa_user.php?x=<?php echo $row['username']?>'"><i class="fas fa-trash"></i></button></td>
    </tr>
<?php } ?>
</table>
</div>
<?php require 'footer.php'; ?>
      
  