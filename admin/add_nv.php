<?php require 'header.php';?>
<title>Quản lý thư viện</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form action="" method="post">
        <h1>Thêm Nhân Viên</h1>
        <label for=""> Mã Nhân Viên</label>
        <input type="text"name='ma'class="form-control"  value="">
        <label for="">Họ Và Tên</label>
        <input type="text"name='ten'class="form-control"  value="">
        <label for=""> Ngày Sinh</label>
        <input type="date"name='nam'class="form-control"  value="">
        <label for=""> Số Điện Thoại</label>
        <input type="text"name='sdt'class="form-control"  value="">
        <label for=""> Địa chỉ</label>
        <input type="text"name='dc'class="form-control"  value=""><br>
        <input type="submit" name ="btn" class="btn btn-primary"value="Thêm mới">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $ma=$_POST['ma'];
        $ten=$_POST['ten'];
        $nam=$_POST['nam'];
        $sdt=$_POST['sdt'];
        $dc=$_POST['dc'];
      //  $fileHA=$_FILES['img'];
        //$tenfileHA=$fileHA['name'];
        $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq = " select * from nhanvien where MaNV='$ma'";
        $kq_con=mysqli_query($conn,$kq);
        $dem=mysqli_num_rows($kq_con);
        if($dem > 0){
            echo "Mã Nhân Viên Đã Tồn Tại";
        }
        else{
            $sql = "INSERT INTO nhanvien VALUES('$ma','$ten','$nam','$sdt','$dc')";
            $result=mysqli_query($conn,$sql);
        if($result == true){
            // if($tenfileHA!=""){
            //     move_uploaded_file($fileHA['tmp_name'],'image/'.$tenfileHA);
            // }
            echo "Thêm Mới Nhân Viên Thành Công !Hãy vào <a href='nhanvien_list.php'>Quản lý nhân viên </a> để xem lại";
        }
        }
    }
    ?>
    <?php
  require 'footer.php'; 
  ?>
