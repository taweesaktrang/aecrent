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
		<a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
		<h1>News</h1>
	</div><!-- /header -->
	
	<br />
	
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
			<li data-role="list-divider">Category</li>
				<?
				include ("config.ini.php");	
				//$objConnect = mysql_connect("localhost","root","1234") or die(mysql_error());
				//$objDB = mysql_select_db("dbrent");
				//$strSQL = " SELECT a.CategoryID,a.CategoryName,COUNT(b.NewsID) As NumNews FROM 
				//category a , news b
				//WHERE a.CategoryID = b.CategoryID
				//GROUP BY a.CategoryID,a.CategoryName
				//ORDER BY a.CategoryID ASC ";

				$strSQL = "SELECT tblmodel.* FROM tblmodel ";
				$strSQL = $strSQL." ORDER BY tblmodel.modelid DESC ";
				$objQuery = mysql_query($strSQL) or die (mysql_error());
				while($objResult = mysql_fetch_array($objQuery))
				{
				?>
					<li><a href="news.php?CategoryID=<?=$objResult["modelid"];?>"><?=$objResult["modelname"];?> <span class="ui-li-count"><?=$objResult["NumNews"];?></span></a></li>
				<?
				}
				?>
		</ul>


</div><!-- /page -->

</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->