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

<div data-role="page">

	<div data-role="header">
		<a href="index.php" data-icon="back" data-iconpos="notext" data-direction="reverse">Back</a>
		<h1>Login</h1>
	</div><!-- /header -->
	
		<?
			include ("config.ini.php");	
			$strSQL = " SELECT * FROM tbluser WHERE username = '".$_POST["txtUser"]."' AND upassword = '".$_POST["txtPassword"]."' ";

			$objQuery = mysql_query($strSQL) or die (mysql_error());
			$objResult = mysql_fetch_array($objQuery);
		?>
		<?
		if(!$objResult)
		{
		?>
			<center><h6>Invalid user & passwordOK</h6></center>
			<a href="index.php#popup" data-role="button" data-icon="back">Try Again</a>
		<?
		}
		else
		{
			$_SESSION["strUserID"] = $objResult["username"];
		?>
       		<meta http-equiv='refresh' content='0;URL=mymenu.php'>
		<?
		}
		?>

</div><!-- /page -->

</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->