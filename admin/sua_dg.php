<?php require 'header.php';?>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
 CẬP NHẬT ĐỘC GIẢ
    <?php
    $madg=$_GET['Madocgia'];
    $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
    $sql = " select * from docgia where Madocgia='$madg'";
    $ketqua=mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
    while($row = mysqli_fetch_assoc($ketqua)){
        $ten=$row['Tendocgia'];
        $ngaysinh=$row['Ngaysinh'];
        $diachi=$row['Diachi'];
    }
    ?>
  <div class="form-group">
    <form action="" method="post">
    <label for="">Mã Độc Giả</label>
    <input type="text"name='ma'class="form-control" readonly='true' value="<?php echo $madg?>">
    <label for="">Tên Độc Giả</label>
    <input type="text"name='ten'class="form-control" value="<?php echo $ten?>">  
    <label for="">Ngày Sinh</label>
    <input type="date"name='ngaysinh'class="form-control" value="<?php echo $ngaysinh?>">
    <label for="">Địa chỉ</label>
    <input type="text"name='diachi'class="form-control"  value="<?php echo $diachi?>">
    <input type="submit" name ="btn" class="btn btn-primary"value="Cập Nhật">
        <?php
        if(isset($_POST['btn'])){
            $ten=$_POST['ten'];
            $ngaysinh=$_POST['ngaysinh'];
            $diachi=$_POST['diachi'];
            $sql="UPDATE docgia SET Tendocgia='$ten',Ngaysinh='$ngaysinh',Diachi='$diachi' WHERE Madocgia='$madg'";
            $ketqua=mysqli_query($conn, $sql)or die ("câu lệnh truy vấn sai");
            if($ketqua==true)
            {
                echo "Cập Nhật Thành Công ! Hãy vào <a href='docgia_list.php'>Danh sách </a> để xem lại";
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
      