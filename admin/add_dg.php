<?php require 'header.php';?>
<title>Quản lý thư viện</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form action="" method="post">
        <h1>Thêm Mới Độc Giả</h1>
        <label for=""> Mã Độc Giả</label>
        <input type="text"name='ma'class="form-control"  value="">
        <label for=""> Tên Độc Giả</label>
        <input type="text"name='ten'class="form-control"  value="">
        <label for="">Ngày Sinh</label>
        <input type="date"name='ngaysinh'class="form-control"  value="">
        <label for="">Địa Chỉ</label>
        <input type="text"name='dc'class="form-control"  value=""><br>
        <input type="submit" name ="btn" class="btn btn-primary"value="Thêm mới">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $ma=$_POST['ma'];
        $ten=$_POST['ten'];
        $ns=$_POST['ngaysinh'];
        $dc=$_POST['dc'];
        $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq = " select * from docgia where Madocgia='$ma'";
        $kq_con=mysqli_query($conn,$kq);
        $dem=mysqli_num_rows($kq_con);
        if($dem > 0){
            echo "Mã Độc Giả Đã Tồn Tại";
        }
        else{
            $sql = "INSERT INTO docgia VALUES('$ma','$ten','$ns','$dc')";
            $result=mysqli_query($conn,$sql);
        if($result == true){
            echo "Thêm Mới Thành Công !Hãy vào <a href='docgia_list.php'>Danh sách độc giả </a> để xem lại";
        }
        }
    }
    ?>
<?php require 'footer.php'; ?>
