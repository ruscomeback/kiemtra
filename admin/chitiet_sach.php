<?php require ("header.php") ?>
<style>
    .dieu-huong{
	float: left;
	width: 100%;
}
.dieu-huong a{
	line-height: 50px;
	padding: 10px;
	color: #222;
	border-bottom: 3px solid #f5f5f5;
	font-size: 14px;
	font-weight: bold;
	box-sizing: border-box;
	animation: .3s ease;
}
.dieu-huong a:hover{
	border-bottom: 3px solid #396;
	color: #396;
}
.detail-product{
	width: 100%;
	background: #fff;
	float: left;
}
.detail-product img{
	float: left;
	width: 40%;
	box-sizing: border-box;
}
.detail-product .info-laptop{
	padding-top: 60px;
	float: left;
	width: 60%;
	box-sizing: border-box;
	padding-left: 5px;
	font-weight: bold;
}
.info-laptop li{
	line-height: 15px;
	font-size: 16px;
	font-weight: normal;
}
.detail1 {
	width: 50%;
	float: left;
	display: inline-block;
}
.detail2{
	padding-top: 40px;
	float: left;
	text-align: left;
	width: 50%;
}
input{
	font-family: UTM Neo Sans Intel Regular;
}
.form-order{
	font-size: 13px;
	font-weight: bold;
	display: block;
	float: left;
	width: 58%;
	box-sizing: border-box;
}
.form-order span{
	font-size: 14px;
	color: red;
	font-weight: bold;
	text-transform: uppercase !important;
}
#thanhtien{
	width: 200px !important;
	border: none;
	background: #fff;
	font-size: 20px;
	font-weight: bold;
	color: green;
	text-align: center;
	margin-left: 50px;
	border-bottom: 2px solid green;
}
.gioithieu{
	float: left;
	font-size: 15px;
	width: 100%;
	padding: 10px;
	box-sizing: border-box;
	text-align: justify;
}
.submit{
	background: white;
	color: green;
	border: 2px solid green;
	padding: 10px 25px;
	outline: none;
	border-radius: 4px;
	text-transform: uppercase;
	font-weight: bold;
	animation: .3s ease;
	cursor: pointer;	
}
.submit:hover{
	background: green;
	color: #fff;
	box-shadow: 2px 3px 4px rgba(30,160,60,0.3);
}
.number{
	width: 100px !important;
	text-align: center;
	border: none;
	outline: none;
	height: 50	px;
	text-align: center;
	font-weight: bold;
	color: green;
	border:1px solid #999;	
}
.minus, .plus{
	height: 25px !important;
	width: 50px;
	border: none;
	border:1px solid #999;
}
.minus{
	border-top-left-radius:3px;
	border-bottom-left-radius:3px; 
	background: url('../images/icons8-minus-25.png') no-repeat center center green;
}
.plus{
	border-top-right-radius:3px;
	border-bottom-right-radius:3px; 
	background: url('../images/icons8-plus-25.png') no-repeat center center green;
}
	#thanhtien{
	width: 200px !important;
	border: none;
	background: #fff;
	font-size: 20px;
	font-weight: bold;
	color: green;
	text-align: center;
	margin-left: 50px;
	border-bottom: 2px solid green;
}
</style>
<?php 
if(isset($_GET['ma'])){
	$productid = $_GET['ma'];
    $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
	$sql_select_detail_product = "select * from sach  where masach = '$productid'";
	$rs = mysqli_query($conn, $sql_select_detail_product);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$ten = $row[1];
			$hinhanh = $row[2];
			$tacgia = $row[3];
			$nxb = $row[5];
			$namxb = $row[6];
			
		}
	}
}
?>
<div class="dieu-huong">
	<a href=""><?php echo $ten; ?></a>
</div>
<div class="detail-product">
	<img src="image/<?php echo $hinhanh; ?>" alt=" <?php echo $ten; ?>" width="400" heigth="400">
	<div class="info-laptop">
		<div class="detail1">
			<h2 style="color: green; margin: 10px 0;"><?php echo $ten; ?></h2>
			Tên sách: <li><?php echo $ten ?></li><br>
			Tác giả: <li><?php echo $tacgia ?></li><br>
			Nhà xuất bản: <li><?php echo $nxb ?></li><br>
			Năm xuất bản:  <li><?php echo $namxb ?></li><br>
	
		</div>
		<div class="detail2">
		</div>
	</div>
	<div class="form-order">
		<!-- <script>
			function minus(){
				var soluong = document.getElementById("soluong");
				var gia = document.getElementById("gia").value;
				var thanhtien = document.getElementById("thanhtien");

				if(soluong.value > 1)
					soluong.value--;

				thanhtien.value = (soluong.value * gia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + " VNĐ";
			}

			function plus(){
				var soluong = document.getElementById("soluong");
				var gia = document.getElementById("gia").value;
				var thanhtien = document.getElementById("thanhtien");
				soluong.value++;

				thanhtien.value = (soluong.value * gia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + " VNĐ";

			}
		</script> -->
		<?php 
		if(isset($_SESSION['username'])){
			if($soluong <= 0){
				echo "<span>SẢN PHẨM NÀY ĐÃ HẾT HÀNG</span>";
			}else{
				$query_login = "SELECT * FROM danhsachuser where username = '".$_SESSION['username']."'";
				$rs2 = mysqli_query($conn, $query_login);
				if($rs2){
					while($row = mysqli_fetch_row($rs2)){
						$fullname = $row[1];
						$diachi = $row[3];
						$phone = $row[4];
					}
				}

				if(isset($_POST['order'])){
					$soluong_order = $_POST['soluong'];
					$address = $_POST['address'];
					$sdt = $_POST['phone'];
					$thanhtien = $soluong_order * $gia;
					if($soluong_order > $soluong){
						echo "<script> alert('Bạn đã order quá số lượng hiện còn')</script>";
					}else{
						if(KiemTraOrder($_SESSION['user'],$_GET['ma'],$soluong_order,$diachi,$sdt)){
							echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng của bạn');</script>";
						}else{
							echo "<script>alert('ERROR: Vui lòng thử lại');</script>";
						}
					}
				}
				?>
				<button class="minus" onclick="minus();"></button>
				<button onclick="plus();" class="plus"></button>
				<form action="" method="POST">
					Số lượng đặt hàng: 
					<div class="order-soluong">
						<input required="" type="text" class="number"  readonly="" id="soluong" name="soluong" value="1" min="1" max="<?php echo $soluong ?>" step="1"> 
						TỔNG TIỀN:  
						<input type="text" value="<?php echo number_format($gia).' VNĐ';?>" id="thanhtien" readonly="" name="thanhtien">
					</div>
					<input type="hidden" value=" <?php  echo($gia)?>" name="gia" id="gia">
					<br>
					Địa chỉ giao hàng
					<input type="text" required="" placeholder="Nhập địa chỉ giao hàng" name="address" value="<?php  echo $diachi;?>">
					Số điện thoại
					<input type="text" required="" placeholder="Nhập số điện thoại" value=" <?php echo($phone);?>" name="phone">
					<input type="submit" value="Thêm vào giỏ hàng" class="submit" name="order">
					<h2 style="font-size: 30px;">Đánh giá của bạn</h2>
				</form>
				<div class="stars">
					  <form action="">
					    <input class="star star-5" id="star-5" type="radio" name="star"/>
					    <label class="star star-5" for="star-5"></label>
					    <input class="star star-4" id="star-4" type="radio" name="star"/>
					    <label class="star star-4" for="star-4"></label>
					    <input class="star star-3" id="star-3" type="radio" name="star"/>
					    <label class="star star-3" for="star-3"></label>
					    <input class="star star-2" id="star-2" type="radio" name="star"/>
					    <label class="star star-2" for="star-2"></label>
					    <input class="star star-1" id="star-1" type="radio" name="star"/>
					    <label class="star star-1" for="star-1"></label>
					  </form>
					</div>
				</form>
	
				<?php 
			}
		}else{
			echo "<h3>Xin mời đăng nhập để đặt hàng </h3><br><a class='submit' href='singin.php'>Đăng Nhập</a>";
		}
		?>
	</div>
    </div>
<?php require ("footer.php") ?>