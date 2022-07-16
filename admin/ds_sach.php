<?php require 'header.php';?>
<style>
	.the{
	box-sizing: border-box;
	line-height: 25px;
	padding: 0px 20px 20px 20px;
	float: left;
	display: block;
	width: 25%;
	font-weight: bold;
	color: #111;
	font-size: 12px;
	animation: .4s ease;
}
.the:hover{
	box-shadow: 2px 8px 9px rgba(0,0,0,0.1);
}
.tren{
	padding-bottom: 5px;
	margin-bottom: 5px;
	border-bottom: 1px solid #aaa;
}
.the .duoi h4 {
	font-size: 15px !important;
	color: black !important;
}
.tren img{
	padding-top: 20px;
}
.duoi h5{
	color: #396;
	font-size: 17px;
}		
.the .duoi{
	display: inline-block;
	width: 100%;
}
.the .duoi span{
	font-weight: normal;
}
</style>
	<h3>Danh sách</h3>
	<div class="new-product">
		<div>
			<?php
            $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
			$sql = "select * from sach";
            $result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
			if ($result) {
				while ($row = mysqli_fetch_row($result)) {
			?>
					<a href="chitiet_sach.php?ma=<?php echo $row[0]; ?>">
						<div class="the">
							<div class="tren">
								<img src="image/<?php echo $row[2]; ?>" height="250" width="250" /><br>
								
								
							</div>
							<div class="duoi">		
                            <h4 class="ten"><?php echo $row[1]; ?></h4><br>						
							</div>
						</div>
					</a>
			<?php
				}
			}
			?>
		</div>
	</div>
<?php require 'footer.php';?>