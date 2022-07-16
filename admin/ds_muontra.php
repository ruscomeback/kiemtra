<?php require 'header.php';?>
  <div class="container">
    <h1> Danh sách mượn trả</h1>
    <a href="muon_sach.php"class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Thêm mới</a>
    <table class="table">
    <thead class="thead-dark">
            <tr>
                <th>Mã mượn trả</th>
                <th>Tên người mượn</th>
                <th>Sách</th>
                <th>Thủ thư</th>
                <th>Ngày mượn</th>
                <th>Trạng thái</th>
                <th>Trả sách</th>
                <th>Xoá thông tin</th>
</tr>
</thread>
    <?php
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
$sql = " select * from muontra";
$result=mysqli_query($conn,"SELECT muontra.*,docgia.Tendocgia,sach.Tensach,nhanvien.Hoten FROM muontra INNER JOIN docgia ON muontra.Madocgia = docgia.Madocgia INNER JOIN sach ON muontra.Masach = sach.Masach INNER JOIN nhanvien ON muontra.MaNV = nhanvien.MaNV; ") or die ("Câu lệnh truy vấn sai");
   while($row = mysqli_fetch_assoc($result))
   {?>
   <tr>
       
       <td><?php echo $row['Mamuontra'];?></td>
       <td><?php echo $row['Tendocgia'];?></td>
       <td><?php echo $row['Tensach'];?></td>
       <td><?php echo $row['Hoten'];?></td>
       <td><?php echo $row['Ngaymuon'];?></td>
       <td><?php echo $row['Trangthai'];?></td>
       <td><button class="btn btn-info" onclick="window.location.href='tra_sach.php?x=<?php echo $row['Mamuontra']?>'">Xác nhận</button>
     </td>
     <td><button class="btn btn-danger"  onclick="window.location.href='xoatt.php?x=<?php echo $row['Mamuontra']?>'">Xoá</button></td>
    </tr>
   <?php
   }
   ?>
   </table>

<?php require 'footer.php'; ?>
      