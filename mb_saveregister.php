<?
session_start();
?>
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
<?
				if (empty($_POST['username'])) {
					echo"<script language=javascript>";
					echo"alert('ชื่อผู้ใช้ดังกล่าวเป็นช่องว่าง')"; 
					echo"</script>";
					echo "<meta http-equiv='refresh' content='0;URL=register.php'>"; 
					exit();											
				}
				if (empty($_POST['username'])) {
					echo"<script language=javascript>";
					echo"alert('ชื่อผู้ใช้ดังกล่าวเป็นช่องว่าง')"; 
					echo"</script>";
					echo "<meta http-equiv='refresh' content='0;URL=register.php'>"; 
					exit();											
				}
				include ("config.ini.php");				
				$strsql="SELECT * FROM tbluser WHERE username='".$_POST['musername']."' ";
				$myrs=mysql_query($strsql) or die(mysql_error());
				if (mysql_num_rows($myrs)!=0){
					echo"<script language=javascript>";
					echo"alert('ชื่อผู้ใช้ดังกล่าวมีอยู่แล้ว โปรดระบุชื่อผู้ใช้ใหม่')"; 
					echo"</script>";
					echo "<meta http-equiv='refresh' content='0;URL=register.php'>"; 
					exit();							
				}			
				$strsql = "INSERT INTO tblmember(titlename,membername,address,provinceid,email,telephone,zip,username) VALUES('".$_POST['titlename']."','".$_POST['name']."','".$_POST['address']."','".$_POST['provinceid']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['zip']."','".$_POST['username']."')";
				mysql_query($strsql) or die(mysql_error());
				$strsql = "INSERT INTO tbluser(username,upassword,fullname,userlevel) VALUES('".$_POST['username']."','".$_POST['password']."','".$_POST['name']."','01')";
				mysql_query($strsql) or die(mysql_error());				

?>

<div data-role="page">

      <div data-role="header">
		<a href="mindex.php" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
		<h1>ลงทะเบียนสมาชิกเรียบร้อย</h1>
	</div><!-- /header -->

		<div class="content" data-role="content">
				<div data-role="fieldcontain">
					 <label for="username">ชื่อผู้ใช้งาน</label>
					 <?=$_POST['username']?>
				</div>
				<div data-role="fieldcontain">
					 <label for="password">รหัสผ่าน</label>
					 <?=$_POST['password']?>
				</div>
				<div data-role="fieldcontain">
					<label for="name">ชื่อ-นามสกุล</label>
                    <?=$_POST['name']?>
				</div>
				<div data-role="fieldcontain">
					 <label for="address">ที่อยู่</label>
                     <?=$_POST['address']?>
				</div>
				<div data-role="fieldcontain">
					 <label for="phone">เบอร์โทรศัพท์</label>
                     <?=$_POST['phone']?>
				</div>
				<div data-role="fieldcontain">
					 <label for="email">อีเมล์</label>
                     <?=$_POST['email']?>
				</div>
                	<p><a href="#popup" data-role="button" data-theme="a" data-rel="dialog" data-transition="pop">Login user and password</a></p>

		</div>		
</div>
<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="c">
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