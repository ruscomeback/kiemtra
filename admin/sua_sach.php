<?php require 'header.php';?>
<?php
 $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
 $kq = " select * from theloai";
 $kq_con=mysqli_query($conn,$kq);
 ?>
</head>
<body>
 <h3><b>CẬP NHẬT SÁCH</b></h3>
    <?php
    $masach=$_GET['Masach'];
    $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
    $sql = " select * from sach where Masach='$masach'";
    $ketqua=mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
    while($row = mysqli_fetch_assoc($ketqua)){
        $tensach=$row['Tensach'];
        $hinh=$row['Hinhanh'];
        $tacgia=$row['Tacgia'];
        $matheloai=$row['Matheloai'];
        $nxb=$row['NXB'];
        $namxb=$row['Namxuatban'];
        $file=$row['Hinhanh'];
    }
    ?>
    <form action="" method="post"enctype="multipart/form-data">
            <label for=""> Mã Sách</label>
            <input type="text"name='masach'class="form-control"readonly='true' value="<?php echo $masach?>">
            <label for=""> Tên Sách</label>
            <input type="text"name='tensach'class="form-control" value="<?php echo $tensach?>">
            <label for=""> Tác giả</label>
            <input type="text"name='tg'class="form-control" value="<?php echo $tacgia?>">
            <label for=""> Mã Thể Loại</label>
         <select name="id"  class="form-control ">
            <option value = ""> Thể Loại </option>
          <?php foreach ($kq_con as $key => $value) {?>
            <option name ="tl"value = "<?php echo $value['id']?>"> <?php echo $value['tentheloai']?>   </option>
            <?php } ?>
        </select>
            <label for="">Nhà xuất bản</label>
            <input type="text"name='nxb'class="form-control"  value="<?php echo $nxb?>">
            <label for="">Năm xuất bản</label>
            <input type="text"name='namxb'class="form-control"  value="<?php echo $namxb?>">
            <label for=""> Hình Ảnh Hiện Tại</label>
            <img src="image/<?php echo $file?>" width="155" height="200">
            <label for=""> Hình Ảnh Cập Nhật</label>
            <input type="file" name="img" ><br>
            <input type="submit" name ="btn"class="btn btn-primary"value="Cập Nhật">
        
        <?php
        if(isset($_POST['btn'])){
            $tensach=$_POST['tensach'];
            $tacgia=$_POST['tg'];
            $matheloai=$_POST['id'];
            $nxb=$_POST['nxb'];
            $namxb=$_POST['namxb'];
            $file=$_FILES['img'];
            $file_name=$file['name'];
            if($file_name=="") 
            $sql="UPDATE sach SET Tensach='$tensach',Tacgia='$tacgia',Matheloai='$matheloai',NXB='$nxb',Namxuatban='$namxb' WHERE Masach='$masach'";
            else
            $sql="UPDATE sach SET Tensach='$tensach',Hinhanh='$file_name',Tacgia='$tacgia',Matheloai='$matheloai',NXB='$nxb',Namxuatban='$namxb' WHERE Masach='$masach'";
            $ketqua=mysqli_query($conn, $sql)or die ("câu lệnh truy vấn sai");
            if($ketqua==true)
            {if($file_name=!"")
                move_uploaded_file($file['tmp_name'],'image/'.$file_name);
                echo "Cập Nhật Thành Công ! Hãy vào <a href='ql_sach.php'>Danh sách sách </a> để xem lại";
            }
        }
        ?>
    </form>
</body>
</html>
<?php
  require 'footer.php'; 
  ?>