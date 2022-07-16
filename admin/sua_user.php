<?php 
  require 'header.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
 CẬP NHẬT USER
    <?php
    $ma=$_GET['Ma'];
    $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
    $sql = " select * from sach where Masach='$masach'";
    $ketqua=mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
    while($row = mysqli_fetch_assoc($ketqua)){
        $tensach=$row['Tensach'];
        $tacgia=$row['Tacgia'];
        $theloai=$row['Theloai'];
        $nxb=$row['NXB'];
        $namxb=$row['Namxuatban'];
    }
    ?>
    <div class="container">
  <div class="form-group">
    <form action="" method="post">
        <table>
            <tr>
                <td>Mã Sách</td>
                <td><input type="text"name='masach' readonly='true' value="<?php echo $masach?>"></td>
            </tr>
            <tr>
                <td>Tên Sách</td>
                <td><input type="text"name='tensach' value="<?php echo $tensach?>"></td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td><input type="text"name='tg' value="<?php echo $tacgia?>"></td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td><input type="text"name='tl'  value="<?php echo $theloai?>"></td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td><input type="text"name='nxb'  value="<?php echo $nxb?>"></td>
            </tr>
            <tr>
                <td>Năm xuất bản</td>
                <td><input type="text"name='namxb'  value="<?php echo $namxb?>"></td>
            </tr>
            <tr>
                <td> <input type="submit" name ="btn"value="Cập Nhật"></td>
            </tr>
        </table>
        <?php
        if(isset($_POST['btn'])){
            $tensach=$_POST['tensach'];
            $tacgia=$_POST['tg'];
            $theloai=$_POST['tl'];
            $nxb=$_POST['nxb'];
            $namxb=$_POST['namxb'];
            $sql="UPDATE sach SET Tensach='$tensach',Tacgia='$tacgia',Theloai='$theloai',NXB='$nxb',Namxuatban='$namxb' WHERE Masach='$masach'";
            $ketqua=mysqli_query($conn, $sql)or die ("câu lệnh truy vấn sai");
            if($ketqua==true)
            {
                echo "Cập Nhật Khách Hàng Thành Công ! Hãy vào <a href='danhsachkhachhang.php'>Danh sách khách hàng </a> để xem lại";
            }
        }
        ?>
    </form>
    </div>
    </div>
</body>
</html>
<?php
  require 'footer.php'; 
  ?>
      