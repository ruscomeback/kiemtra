<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Đăng ký</title>
    <style>
    body{
        background-image: url('./image/library.jpg');
    background-size: 1300px 700px;
    background-position-y: 0px;
    font-size: 16px;
}
#wrapper{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
#form-login{
    max-width: 400px;
    background: rgba(0, 0, 0 , 0.8);
    flex-grow: 1;
    padding: 30px 30px 40px;
    box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
}
.form-heading{
    font-size: 25px;
    color: #f5f5f5;
    text-align: center;
    margin-bottom: 30px;
}
.form-group{
    border-bottom: 1px solid #fff;
    margin-top: 15px;
    margin-bottom: 20px;
    display: flex;
}
.form-group i{
    color: #fff;
    font-size: 14px;
    padding-top: 5px;
    padding-right: 10px;
}
.form-input{
    background: transparent;
    border: 0;
    outline: 0;
    color: #f5f5f5;
    flex-grow: 1;
}
.form-input::placeholder{
    color: #f5f5f5;
}
#eye i{
    padding-right: 0;
    cursor: pointer;
}
.form-submit{
    background: transparent;
    border: 1px solid #f5f5f5;
    color: #fff;
    width: 100%;
    text-transform: uppercase;
    padding: 6px 10px;
    transition: 0.25s ease-in-out;
    margin-top: 30px;
}
.form-submit:hover{
    border: 1px solid #54a0ff;
}
.php{
    color: #f5f5f5;
    text-align: center;
}
    </style>
</head>
<body>
<div id="wrapper">
<form action="" id="form-login" method="post">    
<h1 class="form-heading">Đăng ký</h1>
<div class="form-group">
                <i class="far fa-user"></i>
    <input type="text" class="form-input" name = 'user' placeholder="Tên tài khoản">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
          <input type="password" class="form-input" name = 'pass' placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group">
                <i class="far fa-user"></i>
    <input type="text" class="form-input" name = 'hoten' placeholder="Họ và tên">
            </div>
            <div class="form-group">
            <i class="fas fa-pen"></i>
        <input type="text" class="form-input" name='note'  placeholder="Ghi chú">
</div>
            <input type="submit" class="form-submit" name ="btnd"  value="Đăng Ký">
            <div class= "php">
            <?php
    if(isset($_POST['btnd'])){
        $tk=$_POST['user'];
        $mk=$_POST['pass'];
        $hoten=$_POST['hoten'];
        $note=$_POST['note'];
        $ketnoi=mysqli_connect('localhost','root',"",'quanlythuvien') or die("Kết nối database không thành công");
        $sql = "SELECT * FROM danhsachuser WHERE username = '$tk'";
        $result = mysqli_query($ketnoi, $sql) or die("Câu truy vấn sai!");
        if (!$tk || !$mk ){echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;}
        if(mysqli_num_rows($result) > 0){
            echo "Tài khoản đã tồn tại";
            exit ();}
        $sql = "INSERT INTO danhsachuser VALUES('$tk','$mk','$hoten','$note')";
        $kq=mysqli_query($ketnoi,$sql);
        if($kq==true){
            echo "Đăng ký thành công ! Hãy vào trang <a href='http://localhost:8080/xdql/signin.php'>Đăng Nhập</a>";
        }
        else
        echo "Đăng ký thất bại";
    }
    ?>
        </div>
        </div>
    </form>

     </div>
     </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
<script>
    $(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});
</script>
</html>