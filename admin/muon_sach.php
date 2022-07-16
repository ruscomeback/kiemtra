<?php require 'header.php'; ?>
<title>Quản lý thư viện</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <?php
 $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
 $kq = " select * from docgia ";
 $kq_con=mysqli_query($conn,$kq);
 ?>
 <?php
 $conn1 = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
 $kq1 = " select * from nhanvien ";
 $kq_con1=mysqli_query($conn1,$kq1);
 ?>
 <?php
 $conn3 = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
 $kq3 = " select * from sach ";
 $kq_con3=mysqli_query($conn3,$kq3);
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Mượn sách</h1>
        <label for=""> Tên người mượn</label>
        <select name="ten" id="input" class="form-control ">
            <option value = ""> Tên </option>
          <?php foreach ($kq_con as $key => $value) {?>
            <option value = "<?php echo $value['Madocgia']?>"> <?php echo $value['Tendocgia']?></option>
            <?php } ?>
        </select>
        <label for="">Sách</label>
        <select name="sach" id="input" class="form-control ">
            <option value = ""> Sách </option>
          <?php foreach ($kq_con3 as $key => $value) {?>
            <option value = "<?php echo $value['Masach']?>"> <?php echo $value['Tensach']?></option>
            <?php } ?>
        </select>
        <label for="">Thủ thư</label>
        <select name="nv" id="input" class="form-control ">
            <option value = ""> Thủ thư </option>
          <?php foreach ($kq_con1 as $key => $value) {?>
            <option value = "<?php echo $value['MaNV']?>"> <?php echo $value['Hoten']?></option>
            <?php } ?>
        </select>
        <label for="">Ngày mượn</label>
        <input type="date"name='ngay'class="form-control"  value="">
       

        <br>
        <input type="submit" name ="btn" class="btn btn-primary"value="Mượn">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $ten=$_POST['ten'];
        $sach=$_POST['sach'];
        $tt=$_POST['nv'];
        $ngay=$_POST['ngay'];
        $conn2 = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq2 = " select * from muontra ";
            $sql = "INSERT INTO muontra VALUES(Mamuontra,'$ten','$sach','$tt','$ngay','Chưa trả')";
            $result=mysqli_query($conn2,$sql);
        if($result == true){
            echo "Thành Công !Hãy vào <a href='ds_muontra.php'>Danh sách sách </a> để xem lại";
        }
        }
    
    ?>
    <?php require 'footer.php';  ?>
