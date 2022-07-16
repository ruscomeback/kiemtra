<?php require 'header.php';?>
<title>Quản lý thư viện</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form action="" method="post">
        <h1>Thêm User</h1>
        <label for="">Tên tài khoản</label>
        <input type="text"name='tk'class="form-control"  value="">
        <label for="">Mật khẩu</label>
        <input type="password"name='mk'class="form-control"  value="">
        <label for="">Họ và tên</label>
        <input type="text"name='name'class="form-control"  value="">
        <label for="">Ghi chú</label>
        <input type="text"name='note'class="form-control"  value=""><br>
        <input type="submit" name ="btn" class="btn btn-primary"value="Thêm mới">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $tk=$_POST['tk'];
        $mk=$_POST['mk'];
        $name=$_POST['name'];
        $note=$_POST['note'];
        $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq = " select * from danhsachuser where username='$tk'";
        $kq_con=mysqli_query($conn,$kq);
        $dem=mysqli_num_rows($kq_con);
        if($dem > 0){
            echo "Tài Khoản Đã Tồn Tại";
        }
        else{
            $sql = "INSERT INTO danhsachuser VALUES('$tk','$mk','$name','$note')";
            $result=mysqli_query($conn,$sql);
        if($result == true){
            echo "Thêm Mới Thành Công !Hãy vào <a href='user_list.php'>Quản lý user </a> để xem lại";
        }
        }
    }
    ?>
    <?php
  require 'footer.php'; 
  ?>
