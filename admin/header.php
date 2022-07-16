<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>QUẢN LÝ THƯ VIỆN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/css_for_header.css">
<link rel="stylesheet" href="css/style_for_index.css">


<link href="icon/css/all.css" rel="stylesheet">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Cambria", sans-serif}
</style>
</head>
<body class="w3-light-grey">
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><?php 
			if(isset($_SESSION['username'])){
			echo $_SESSION['username'];}
				?></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="image/avatar1.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Xin chào, <strong><?php 
			if(isset($_SESSION['username'])){
			echo $_SESSION['username'];}
				?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="tttk.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h3>QUẢN LÝ</h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="user_list.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-user fa-fw"></i>User</a>
    <a href="ql_sach.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-book fa-fw"></i>Sách</a>
    <a class="w3-bar-item w3-button w3-padding " href="ds_muontra.php"><i class="fa fa-book fa-fw"></i>Mượn trả</a>
    <a href="nhanvien_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Thủ thư</a>
    <a href="docgia_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-vcard fa-fw"></i>Độc giả</a>
    <a href="theloai_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-alt"></i>Thể loại</a>
    <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a> -->
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out-alt"></i>  Đăng Xuất</a><br><br>
    
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<!-- Header -->
<!-- <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header> -->
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <!-- <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Tin nhắn</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Lượt xem</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Chia sẻ</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Người dùng</h4>
      </div> -->
    </div>
  </div>