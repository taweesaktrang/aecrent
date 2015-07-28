<!DOCTYPE html> 
<html> 
	<head> 
	<title>AEC RENTAL</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="theme/jquery.mobile-1.1.0.min.css" />
	<script src="theme/jquery-1.7.1.min.js"></script>
	<script src="theme/jquery.mobile-1.1.0.min.js"></script>
	</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>ระบบเช่ารถจักรยานยนต์</h1>
	</div><!-- /header -->
	
	<br />
	
	<ul data-role="listview" data-inset="true" data-theme="d">
			<li><a href="mb_listmodel.php">รุ่นรถจักรยานยนต์</a></li>
			<li><a href="mb_register.php">สมัครสมาชิก</a></li>
	</ul>
	
	<br />

	<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider">My Aonang Econ Inn</li>
				<li><a href="mb_aboutus.php">เกี่ยวกับเรา</a></li>
				<li><a href="mb_contactus.php">ติดต่อเรา</a></li>
	</ul>

	<p><a href="#popup" data-role="button" data-theme="a" data-rel="dialog" data-transition="pop">Login user and password</a></p>



</div><!-- /page -->

<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>MEMBER LOGIN</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Login</h2>
		<form action="login.php" method="post">
		Username : <input type="text" name="txtUser">
		Password :<input type="password" name="txtPassword">
		<br />
		<input type="submit" value="Login">
		</form>

		<p><a href="#one" data-rel="back" data-role="button" data-inline="true" data-icon="back">Close</a></p>	
	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>Aonang Econ Inn Rent System</h4>
	</div><!-- /footer -->
</div><!-- /page popup -->


<div data-role="page" id="popup1">

	<div data-role="header" data-theme="e">
		<h1>Login</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<form action="login.php" method="post">
		Username : <input type="text" name="txtUser">
		Password :<input type="password" name="txtPassword">
		<br />
		<input type="submit" value="Login">
		</form>

	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>Aonang Econ Inn Rent System</h4>
	</div><!-- /footer -->
</div><!-- /page popup -->
</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->