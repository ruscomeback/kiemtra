<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>QUẢN LÝ THƯ VIỆN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/css_for_header.css">
<link href="icon/css/all.css" rel="stylesheet">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</head>
<body class="w3-light-grey">
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class=" w3-right"><?php 
			if(isset($_SESSION['username'])){
			echo $_SESSION['username'];}
				?></span>
</div>
<div id="mySidenav" class="sidenav">
<div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="image/avatar1.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Xin chào, <strong><?php 
			if(isset($_SESSION['username'])){
			echo $_SESSION['username'];}
				?></strong></span><br>
    </div>
  </div>
  <hr>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="w3-bar-block">
    <a href="sach_list.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-book fa-fw"></i>Sách</a>
    <a href="nhanvien_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Nhân viên</a>
    <a href="user_list.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-user fa-fw"></i>User</a>
    <a href="docgia_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-vcard fa-fw"></i>Độc giả</a>
    <a href="theloai_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-alt"></i>Thể loại</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out-alt"></i> Đăng Xuất</a><br><br>
    
  </div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

