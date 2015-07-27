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
		<a href="mindex.php" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
		<h1>รุ่นรถจักรยานยนต์</h1>
	</div><!-- /header -->
	
	<br />
	
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
			<li data-role="list-divider">รุ่นรถจักรยานยนต์</li>
				<?
				include ("config.ini.php");	

				$strSQL = "SELECT tblmodel.* FROM tblmodel ";
				$strSQL = $strSQL." ORDER BY tblmodel.modelid DESC ";
				$objQuery = mysql_query($strSQL) or die (mysql_error());
				while($objResult = mysql_fetch_array($objQuery))
				{
				?>
				<li>
					<a href="#hammer/red">
						<h2><?=$objResult["modelid"].":".$objResult["modelname"];?></h2>
						<p><?=$objResult["modelname"];?></p>
						<p class="ui-li-aside"><?=$objResult['price']?> ฿</p>
						<img src="picture/<?=$objResult['picshow01']?>">
					</a>					
				</li>
                
				<?
				}
				?>
		</ul>


</div><!-- /page -->

</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->