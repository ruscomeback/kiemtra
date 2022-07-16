<?php include('header.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
								<div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Bảng mượn sách</strong>
                                </div>

		<div class="span12">		

		<form method="post" action="#">
<div class="span3">

											<div class="control-group">
				<label class="control-label" for="inputEmail">Tên người mượn</label>
				<div class="controls">
				<select name="dg" class="chzn-select">
				<option></option>
				<?php $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('Không thể kết nối sql');
                      $sql = " select * from docgia";
                      $result=mysqli_query($conn,$sql) or die ("Câu lệnh truy vấn sai");
				while ($row=mysqli_fetch_array($result)){ ?>
				<option value="<?php echo $row['Madocgia']; ?>"><?php echo $row['Tendocgia']; ?></option>
				<?php } ?>
				</select>
				</div>
			</div>
				<div class="control-group"> 
					<label class="control-label" for="inputEmail">Ngày mượn</label>
					<div class="controls">
					<input type="date"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="ngaymuon" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
					</div>
				</div>
				<div class="control-group"> 
					<div class="controls">

								<button name="btn" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>Mượn</button>
					</div>
					<?php
    if(isset($_POST['btn'])){
        $ten=$_POST['dg'];
        $date=$_POST['ngaymuon'];
        $name=$_POST['name'];
        $note=$_POST['note'];
        $conn = mysqli_connect('localhost','root',"",'quanlythuvien') or die ('không thể kết nối sql');
        $kq = " select * from muonsach where Mamuontra='$tk'";
        $kq_con=mysqli_query($conn,$kq);
        $dem=mysqli_num_rows($kq_con);
        if($dem > 0){
            echo "Lỗi";
        }
        else{
            $sql = "INSERT INTO muonsach VALUES('$tk','$mk','$name','$note')";
            $result=mysqli_query($conn,$sql);
        if($result == true){
            echo "Thêm Mới Thành Công !Hãy vào <a href='_list.php'>Quản lý user </a> để xem lại";
        }
        }
    }
    ?>
				</div>
				</div>
				<div class="span8">
						<div class="alert alert-success"><strong>Chọn sách</strong></div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                <thead>
                                    <tr>
                       
                                        <th>Mã sách</th>                                 
                                        <th>Tên sách</th>      
                                        <th>Hình ảnh</th>                                 
                                        <th>Thể loại</th>
										<th>Tác giả</th>
										<th>Nhà xuất bản</th>
                                        <th>Năm xuất bản</th>
										<th>Add</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($conn,"select * from sach ")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['Masach'];  
									$cat_id=$row['Matheloai'];

											$cat_query = mysqli_query($conn,"select * from theloai where id = '$cat_id'")or die(mysqli_error());
											$cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
									
									                              
                                    <td><?php echo $row['Masach']; ?></td>
                                    <td><?php echo $row['Tensach']; ?></td>
                                    <td><img src="image/<?php echo $row['Hinhanh']?>" width="60" height="50"></td>
									<td><?php echo $cat_row ['tentheloai']; ?> </td> 
                                    <td><?php echo $row['Tacgia']; ?> </td> 
									<td><?php echo $row['NXB']; ?></td>
                                    <td><?php echo $row['Namxuatban']; ?></td>
                                    <td width="20">
												<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>" >
												
                                    </td>
									
                                    </tr>
									<?php  }  ?>
                                </tbody>
                            </table>
							
			    </form>
			</div>		
			</div>		
<script>		
$(".uniform_on").change(function(){
    var max= 3;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('3 Books are allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>