<?php require ("header.php") ?>
<div class="formSearch">
	
<a href="add_sach.php"class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Thêm mới sách</a>
<!-- <div id="my-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="my-table"></label></div>
<label>Show <select name="my-table_length" aria-controls="my-table" class=""><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries</label> -->
</div>

<h2>Quản Lý Sách</h2>
<table class="table" id="my-table">
	<thead>
		<tr>
			<th class="cart_product">Sách</th>
			<th style="width:600px">Mô Tả</th>
            <th></th>
			<th >Hoạt động</th>
		</tr>
	</thead>
	<tbody>
		<?php	
$conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
$sql = " select * from sach";
$result=mysqli_query($conn,"SELECT sach.*,theloai.tentheloai AS Tentheloai FROM sach JOIN theloai ON sach.Matheloai = theloai.id;") or die ("câu lệnh truy vấn sai"); 

		if($result){

			while($row = mysqli_fetch_row($result)){
				?>
				<tr>
					<td>
						<img src="image/<?php echo($row[2]); ?>" alt="" width="155" height="200">
					</td>
					<td class="">
						<h5 style="font-weight: bold;"><?php echo $row[1]; ?></h5>
						<b>Tác giả:</b> <?php echo $row[3]; ?>
						<br>
						<b>Thể Loại:</b> <?php echo $row[7]; ?>
						<br>
						<b>Nhà xuất bản:</b>: <?php echo $row[5]; ?>
						<br>
						<b>Năm xuất bản:</b> <?php echo $row[6]; ?>
						<br>
					</td>
					<td>
					</td>
					<td><button class="btn btn-primary" onclick="window.location.href='sua_sach.php?Masach=<?php echo ($row[0])?>'"> <i class="fas fa-pen"></i></button>
					<button class="btn btn-danger" onclick="window.location.href='xoa_sach.php?x=<?php echo ($row[0])?>&&hinhanh=<?php echo ($row[2])?>'"><i class="fas fa-trash"></i></button></td>
				</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>

<?php require ("footer.php") ?>
