<?php 
  require 'header.php';
  ?>

<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
 CẬP NHẬT NHÂN VIÊN
    <?php
    $manv=$_GET['MaNV'];
    $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
    $sql = " select * from nhanvien where MaNV='$manv'";
    $ketqua=mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
    while($row = mysqli_fetch_assoc($ketqua)){
        $ten=$row['Hoten'];
        $ngaysinh=$row['Ngaysinh'];
        $sdt=$row['SDT'];
        $diachi=$row['Diachi'];
    }
    ?>
  <div class="form-group">
    <form action="" method="post">
    <label for="">Mã Nhân Viên</label>
    <input type="text"name='manv'class="form-control" readonly='true' value="<?php echo $manv?>">
    <label for="">Tên Nhân Viên</label>
    <input type="text"name='tennv'class="form-control" value="<?php echo $ten?>">  
    <label for="">Ngày Sinh</label>
    <input type="date"name='ngaysinh'class="form-control" value="<?php echo $ngaysinh?>">
    <label for="">Số Điện Thoại</label>
    <input type="text"name='sdt'class="form-control"  value="<?php echo $sdt?>">
    <label for="">Địa chỉ</label>
    <input type="text"name='diachi'class="form-control"  value="<?php echo $diachi?>">
    <input type="submit" name ="btn" class="btn btn-primary"value="Cập Nhật">
        <?php
        if(isset($_POST['btn'])){
            $ten=$_POST['tennv'];
            $ngaysinh=$_POST['ngaysinh'];
            $sdt=$_POST['sdt'];
            $diachi=$_POST['diachi'];
            $sql="UPDATE nhanvien SET Hoten='$ten',Ngaysinh='$ngaysinh',SDT='$sdt',Diachi='$diachi' WHERE MaNV='$manv'";
            $ketqua=mysqli_query($conn, $sql)or die ("câu lệnh truy vấn sai");
            if($ketqua==true)
            {
                echo "Cập Nhật Khách Hàng Thành Công ! Hãy vào <a href='nhanvien_list.php'>Danh sách nhân viên </a> để xem lại";
            }
        }
        ?>
    </form>
    </div>

</body>
</html>
<?php
  require 'footer.php'; 
  ?>
      