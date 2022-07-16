<?php require 'header.php';?>
  <div class="container">
    <h1> Danh sách độc giả</h1>
    <table class="table">
    <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Mã độc giả</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Hoạt động</th>
</tr>
</thread>
    <?php
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
$sql = " select * from docgia";
$result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
$s=0;
   while($row = mysqli_fetch_assoc($result))
   {?>
   <tr>
       
       <td><?php echo $s+=1;?></td>
       <td><?php echo $row['Madocgia'];?></td>
       <td><?php echo $row['Tendocgia'];?></td>
       <td><?php echo $row['Ngaysinh'];?></td>
       <td><?php echo $row['Diachi'];?></td>
       <td><button class="btn btn-primary" onclick="window.location.href='sua_dg.php?Madocgia=<?php echo $row['Madocgia']?>'"><i class="fas fa-pen"></i></button> 
       <button class="btn btn-danger" onclick="window.location.href='xoa_dg.php?x=<?php echo $row['Madocgia']?>'"><i class="fas fa-trash"></i></button>
     </td>
    </tr>
   <?php
   }
   ?>
   </table>
   <a href="add_dg.php"class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Thêm mới</a>
   <?php
  require 'footer.php'; 
  ?>
      