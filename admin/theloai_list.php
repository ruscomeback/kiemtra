<?php require 'header.php';?>
<div class="container"> 
  <h1> Thể loại</h1>
  <?php 

if(isset($_POST['submit'])){
	$tl = $_POST['new-tl'];
   $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
	$sql = "INSERT INTO theloai (tentheloai) VALUES ('$tl')";
   $result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
	if($result){
		echo "<script> alert('Thêm Thành Công!')</script>";
	}
}
?>	
<div class="">

	<form action="" method="POST">
		<input class="txttext" type="text" placeholder="Nhập Tên Thể Loại ..." name="new-tl" required=""><br>
		<input type="submit" value="Thêm mới " class="btn btn-success" name="submit">
	</form>
    <table class="table">
     <thead class="thead-dark">
        <tr>
            <th>Mã thể loại</th>
            <th>Tên thể loại</th>
            <th>Thao tác</th>
        </tr>
      </thread>
<?php
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
$sql = " select * from theloai";
$result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
   while($row = mysqli_fetch_assoc($result)){
?>
   <tr> 
       <td><?php echo $row['id'];?></td>
       <td><?php echo $row['tentheloai'];?></td>
       <td ><button class="btn btn-danger" onclick="window.location.href='xoa_tl.php?x=<?php echo $row['id']?>'"><i class="fas fa-trash"></i></button></td>
    </tr>
<?php } ?>
</table>
</div>
<?php require 'footer.php'; ?>
      
  