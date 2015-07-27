<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>My Menu</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="theme/jquery.mobile-1.1.0.min.css" />
	<script src="theme/jquery-1.7.1.min.js"></script>
	<script src="theme/jquery.mobile-1.1.0.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
	<section id="home" data-role="page" data-title="Home">
		<header data-role="header"><h1>เมนูสมาชิก ยินดีต้อนรับคุณ  <?=$_SESSION["strUserID"]?></h1></header>
		<div class="content" data-role="content">
			<div class="content" data-role="controlgroup">
				<a href="mb_profile.php" data-role="button" data-icon="star" >ข้อมูลส่วนตัว</a>
				<a href="mb_ulistmodel.php" data-role="button" data-icon="check" >การเช่ารถจักรยานต์</a>
				<a href="logout.php" data-role="button" data-icon="grid" >ออกจากระบบ</a>
				<!--<a href="#check" data-role="button" data-icon="search" >เช็ครอบภาพยนตร์</a>-->
			</div>
		</div>
        
		<footer data-role="footer"><h1>Copyright@2014</h1></footer>
	</section>
</body>
</html>