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
    <script>
		function calcfunc() {
			 var val1 = parseFloat(document.formbook.amount.value);
			 var val2 = parseFloat(document.formbook.price.value);
			 var val3 = parseFloat(document.formbook.total.value);
			 document.formbook.total.value=val1*val2;
		}
	
	</script>
</head> 
<body> 

<div data-role="page">
<?
	$objConnect = mysql_connect("localhost","root","1234") or die(mysql_error());
	$objDB = mysql_select_db("dbrent");
	mysql_query("set names utf8");
	
    $query = "SELECT tblmodel.*,tblyeehor.yeehorname FROM tblmodel Inner Join tblyeehor ON tblmodel.yeehorid = tblyeehor.yeehorid ";
    $query = $query." WHERE modelid='".$_POST['modelid']."'";
    $rs = mysql_query($query);
    $item = mysql_fetch_assoc($rs);
	$strsql="SELECT tblmember.* FROM tblmember WHERE tblmember.username='".$_SESSION["strUserID"]."' ";
	$myrs=mysql_query($strsql);
	$data = mysql_fetch_assoc($myrs);
	$memberid = $data['memberid'];
?>
      <div data-role="header">
		<a href="ulistmodel.php" data-icon="back" data-iconpos="notext" data-direction="reverse">Back</a>      
		<h1>การจองรถจักรยานยนต์</h1>
	</div><!-- /header -->

		<div class="content" data-role="content">
				<div data-role="fieldcontain">
					 <label for="modelname">รุ่นรถจักรยานยนต์</label>
					 <?=$item['modelname']?>
				</div>
				<div data-role="fieldcontain">
					<label for="membername">ชื่อ-นามสกุล</label>
					<?=$data['membername']?>
				</div>
				<div data-role="fieldcontain">
					 <label for="phone">เบอร์โทรศัพท์</label>
					 <?=$data['telephone']?>
				</div>
				<div data-role="fieldcontain">
					 <label for="email">อีเมล์</label>
					 <?=$data['email']?>
				</div>
                
				<div data-role="fieldcontain">
					 <label for="bookdate">วันเที่จอง</label>
					 <?=$bookdate.' - '.$finishdate?>
				</div>
				<div data-role="fieldcontain">
					 <label for="amount">จำนวนวัน</label>
					 <?=$amount?> วัน
				</div>
				<div data-role="fieldcontain">
					 <label for="price">ค่าเช่า / วัน </label>
					<?=$item['price']?> บาท
				</div>
				<div data-role="fieldcontain">
					 <label for="total">ยอดเงิน </label>
					 <?=$amount * $item['price'] ?> บาท
				</div>
		</div>		
</div>
</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->