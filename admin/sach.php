<?php require 'header.php';?>
<div class="wrap-new-product">
	<h3><br />Sách </h3>
	<div class="new-product">
		<div>
			<?php
            $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
            $sql = " select * from sach";
            $result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
			$row = mysqli_fetch_row( $result);
			if ( $result) {
				while ($row = mysqli_fetch_row( $result)) {
			?>
					<a href="chitietsach.php?ma=<?php echo $row[0]; ?>">
						<div class="item-sv">
							<div class="rowtren">
								<img src="image/<?php echo  $row[2]; ?>" height="200" width="200" /><br>
								<h4><?php echo $row[1]; ?></h4><br>
							</div>
							<div class="rowduoi">
								Tác Giả <span><?php echo $row[3]; ?></span><br>
								Thể Loại <span><?php echo $row[4]; ?></span><br>
								Nhà xuất bản<span><?php echo $row[5] ?></span><br>
								Năm xuất bản <span><?php echo $row[6] ?></span><br>
							</div>
						</div>
					</a>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>
<?php require 'footer.php';?>