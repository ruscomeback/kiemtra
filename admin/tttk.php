<?php require ("header.php")?>
<?php 
function getValueUser($username, $vitri){
	$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
	$sql = "select * from danhsachuser where username = '".$username."'";
	$value ;
	if($rs = mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_row($rs)) {
			$value = $row[$vitri];
		}
	}
	return $value;
} ?>
<?php if(isset($_SESSION['username'])){
	$username = getValueUser($_SESSION['username'],0);
	$hoten = getValueUser($_SESSION['username'],2);
	$ghichu = getValueUser($_SESSION['username'],3);

	?>
	
	<div class="user-info">
		<h2>THÔNG TIN TÀI KHOẢN</h2>
		<form action="" method="POST">
			<div class="container">
				<h1> <?php echo $hoten ?></h1>
				<hr>

				<label for="username"><b>Tên Đăng Nhập</b></label><br>
				<input type="text" style="background: #555;color: #ddd" disabled="" name="username"  value="<?php echo($username) ?>">
<br>
				<label for="Hoten"><b>Họ Và Tên</b></label><br>
				<input type="text"  name="Hoten"disabled=""  value="<?php echo($hoten) ?>"> <Br>
                <label for="ghichu"><b>Ghi chú</b></label><br>
				<input type="text"  name="ghichu"  disabled=""value="<?php echo($ghichu) ?>"> 
				<hr>
			</div>
		</form>
	</div>
	<?php 
} ?>


<?php require ("footer.php") ?>