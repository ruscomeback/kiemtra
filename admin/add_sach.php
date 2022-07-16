<?php 
  require 'header.php';
  ?>
<title>Quản lý thư viện</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <?php
 $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
 $kq = " select * from theloai";
 $kq_con=mysqli_query($conn,$kq);
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Thêm Mới Sách</h1>
        <label for=""> Mã Sách</label>
        <input type="text"name='masach'class="form-control"  value="">
        <label for=""> Tên Sách</label>
        <input type="text"name='tensach'class="form-control"  value="">
        <label for=""> Hình Ảnh</label>
        <input type="file"name='img'class="form-control"  value="">
        <label for=""> Tác giả</label>
        <input type="text"name='tacgia'class="form-control"  value="">
        <label for=""> Mã Thể Loại</label>
         <select name="id" id="input" class="form-control ">
            <option value = ""> Thể Loại </option>
          <?php foreach ($kq_con as $key => $value) {?>
            <option value = "<?php echo $value['id']?>"> <?php echo $value['tentheloai']?>   </option>
            <?php } ?>
        </select>
        <label for=""> Nhà xuất bản</label>
        <input type="text"name='nxb'class="form-control"  value="">
        <label for=""> Năm xuất bản</label>
        <input type="text"name='namxb'class="form-control"  value="">
       

        <br>
        <input type="submit" name ="btn" class="btn btn-primary"value="Thêm mới Sản Phẩm">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $ma=$_POST['masach'];
        $ten=$_POST['tensach'];
        $tg=$_POST['tacgia'];
        $nxb=$_POST['nxb'];
        $namxb=$_POST['namxb'];
        $matheloai=$_POST['id'];
        $file=$_FILES['img'];
        $file_name=$file['name'];
        $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq = " select * from sach where Masach='$ma'";
        $kq_con=mysqli_query($conn,$kq);
        $dem=mysqli_num_rows($kq_con);
        if($dem > 0){
            echo "Mã Sách Đã Tồn Tại"; exit();
        }
        else{
            $sql = "INSERT INTO sach VALUES('$ma','$ten','$file_name','$tg','$matheloai','$nxb','$namxb')";
            $result=mysqli_query($conn,$sql);
        if($result == true){
             if($file_name!=""){
                 move_uploaded_file($file['tmp_name'],'image/'.$file_name);
             }
            echo "Thêm Sản Phẩm Thành Công !Hãy vào <a href='sach_list.php'>Danh sách sách </a> để xem lại";
        }
        }
    }
    ?>
    <?php
  require 'footer.php'; 
  ?>
