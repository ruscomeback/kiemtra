<?php require 'header.php';?>
<title>Quản lý thư viện</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form action="" method="post">
        <h1>Thêm Thể Loại</h1>
        <label for="">Mã Thể Loại</label>
        <input type="text"name='ma'class="form-control"  value="">
        <label for="">Tên Thể Loại</label>
        <input type="text"name='ten'class="form-control"  value="">
       <br>
        <input type="submit" name ="btn" class="btn btn-primary"value="Thêm mới">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $id=$_POST['ma'];
        $ten=$_POST['ten'];
        $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq = " select * from theloai where tentheloai='$ten'";
        $kq_con=mysqli_query($conn,$kq);
        $dem=mysqli_num_rows($kq_con);
        if($dem > 0){
            echo "Tên Thể Loại Đã Tồn Tại";
        }
        else{
            $sql = "INSERT INTO theloai VALUES('$id','$ten')";
            $result=mysqli_query($conn,$sql);
        if($result == true){
            echo "Thêm Mới  Thành Công !Hãy vào <a href='theloai_list.php'>Thể loại </a> để xem lại";
        }
        }
    }
    ?>
    <?php
  require 'footer.php'; 
  ?>
