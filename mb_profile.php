 <?
session_start();
if($_SESSION["strUserID"] == "")
{
	header("location:index.php");
	exit();
}
?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title>ThaiCreate.Com</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="theme/jquery.mobile-1.1.0.min.css" />
	<script src="theme/jquery-1.7.1.min.js"></script>
	<script src="theme/jquery.mobile-1.1.0.min.js"></script>
</head> 
<body> 

<div data-role="page">
	<div data-role="header">
		<a href="login.php" data-icon="back" data-iconpos="notext" data-direction="reverse">Back</a>
		<h1>Profile</h1>
	</div><!-- /header -->
 
 		<?
			$objConnect = mysql_connect("localhost","root","1234") or die(mysql_error());
			$objDB = mysql_select_db("dbrent");
			mysql_query("set names utf8");
			$strSQL = " SELECT * FROM tbluser WHERE username = '".$_SESSION["strUserID"]."' ";

			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$objResult = mysql_fetch_array($objQuery);
		?>
		<div style="padding-left:10px;padding-right:10px">

				<center><h3>Account Information</h3></center>
		
				<div data-role="fieldcontain">
							 <label for="name">Username :</label>
							 <?=$objResult["username"];?>
				</div>

				<div data-role="fieldcontain">
							 <label for="name">Name :</label>
							 <?=$objResult["fullname"];?>
				</div>

				<div data-role="fieldcontain">
							 <label for="name">Password :</label>
							 <?=$objResult["upassword"];?>
				</div>

				<div data-role="fieldcontain">
							 <label for="name">Email :</label>
							<?=$objResult["email"];?>
				</div>
	
	</div>

<a href="#AccDialog" data-role="button" data-rel="dialog" data-transition="slideup">Account Option</a>

</div><!-- /page -->
<div data-role="page" id="AccDialog"> 
 
	<div data-role="content"> 
		<a href="logout.php" data-role="button" data-icon="star" data-theme="e">Logout</a>
		<a href="profile.php" data-role="button" data-icon="star" data-theme="b">Cancel</a>
	</div>
	
</div>

</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->