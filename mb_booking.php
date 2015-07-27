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
	include ("config.ini.php");
	$modelid = $_GET['id'];
    $query = "SELECT tblmodel.*,tblyeehor.yeehorname FROM tblmodel Inner Join tblyeehor ON tblmodel.yeehorid = tblyeehor.yeehorid ";
    $query = $query." WHERE modelid='".$_GET['id']."'";
    $rs = mysql_query($query);
    $item = mysql_fetch_assoc($rs);
	$strsql="SELECT tblmember.* FROM tblmember WHERE tblmember.username='".$_SESSION["strUserID"]."' ";
	$myrs=mysql_query($strsql);
	$data = mysql_fetch_assoc($myrs);
	$memberid = $data['memberid'];
	

?>
      <div data-role="header">
		<a href="mb_ulistmodel.php" data-icon="back" data-iconpos="notext" data-direction="reverse">Back</a>      
		<h1>การจองรถจักรยานยนต์</h1>
	</div><!-- /header -->

		<div class="content" data-role="content">
			<form name="formbook" action="mb_savebooking.php" method="post">
            <input name="status" type="hidden" value="save">
            <input name="memberid" type="hidden" value="<?=$memberid?>">
            <input name="modelid" type="hidden" value="<?=$_GET['id']?>">
				<div data-role="fieldcontain">
					 <label for="modelname">รุ่นรถจักรยานยนต์</label>
					 <input  type="text" readonly name="modelname" value="<?=$item['modelname']?>" id="modelname">
				</div>
				<div data-role="fieldcontain">
					<label for="membername">ชื่อ-นามสกุล</label>
					<input type="text" name="membername" readonly value="<?=$data['membername']?>" id="membername">
				</div>
				<div data-role="fieldcontain">
					 <label for="phone">เบอร์โทรศัพท์</label>
					 <input type="tel" name="phone" readonly value="<?=$data['telephone']?>" id="phone">
				</div>
				<div data-role="fieldcontain">
					 <label for="email">อีเมล์</label>
					 <input type="email" name="email" readonly value="<?=$data['email']?>" id="email">
				</div>
                
				<div data-role="fieldcontain">
					 <label for="bookdate">วันเที่จอง</label>
					 <input type="date" name="bookdate" id="bookdate">
				</div>
				<div data-role="fieldcontain">
					 <label for="amount">จำนวนวัน</label>
					 <input type="number" name="amount" value="1" id="amount" onKeyUp="calcfunc()"> วัน
				</div>
				<div data-role="fieldcontain">
					 <label for="price">ค่าเช่า / วัน </label>
					 <input type="number" name="price" readonly value="<?=$item['price']?>" id="price"> บาท
				</div>
				<div data-role="fieldcontain">
					 <label for="total">ยอดเงิน </label>
					 <input type="number"  name="total" id="total" value="<?=$item['price']?>"  onKeyUp="calcfunc()"> บาท
				</div>
				<input type="submit" value="บันทึกการจอง" data-inline="true">
				<input type="reset" value="ล้างข้อมูล" data-inline="true">
			</form>
		</div>		
</div>
</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->