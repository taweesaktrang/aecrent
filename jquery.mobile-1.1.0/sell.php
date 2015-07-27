<?
	session_start();
	include ("config.inc.php");
	
?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title>THA SAND TRANG</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1;"> 
	<link rel="stylesheet" href="jquery.mobile-1.1.0.min.css" />
	<script src="jquery-1.7.1.min.js"></script>
	<script src="jquery.mobile-1.1.0.min.js"></script>
    
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>Welcome TO TST</h1>
	</div><!-- /header -->

	<ul data-role="listview" data-inset="true" data-filter="true">
			<li><a href="page1.html">Page1</a></li>
			<li><a href="page2.html">Page 2</a></li>
		</ul>

	<p><a href="#popup" data-role="button" data-rel="dialog" data-transition="pop">Login user and password</a></p>

	<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d">
				<li data-role="list-divider">My</li>
				<li><a href="aboutus.html">About Us</a></li>
				<li><a href="contactus.html">Contact Us</a></li>
	</ul>


</div><!-- /page -->


<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Dialog</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Login</h2>
		<form action="login.php" method="post">
		RegisterID : <input name="registerid" type="text" size="10" maxlength="10">
		Customer :
		<select id="customerid" name="customerid" class="inputtextlist">
        <?
                $mysql = "SELECT customerid,custname  FROM tblcustomer  ORDER BY customerid";
                $myrs = @mysql_query($mysql);
                while ($row = @mysql_fetch_assoc($myrs)){
        ?>                               		
                <option value="<?=$row[customerid]?>"  <?=$data[customerid]==$row[customerid] ? "selected = selected" : "''";?> ><?=$row[customerid]?></option>
        <? } ?>
        </select>		
		Type of sand :

                          <select id="sandid" name="sandid" class="inputtextlist">
                            <?
                                    $mysql = "SELECT sandid,sandname FROM tblsand  ORDER BY sandid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                            <option value="<?=$row[sandid]?>"  <?=$data[sandid]==$row[sandid] ? "selected = selected" : "''";?> >
                              <?=$row[sandname]?>
                            </option>
                            <? } ?>
                          </select>
                          Type Of Payment :
						   <select name="typeofpay" class="inputtextlist" id="typeofpay">
                              <option value="M" selected="selected">CASH</option>
                              <option value="C">CREDIT</option>
                            </select>                          
                          
		<br />
		<input type="submit" value="Login">
		</form>

		<p><a href="#one" data-rel="back" data-role="button" data-inline="true" data-icon="back">Close</a></p>	
	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page popup -->

</body>
</html>