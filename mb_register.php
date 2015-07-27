<!DOCTYPE html> 
<html> 
	<head> 
	<title>AEC RENTAL</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="theme/jquery.mobile-1.1.0.min.css" />
	<script src="theme/jquery-1.7.1.min.js"></script>
	<script src="theme/jquery.mobile-1.1.0.min.js"></script>
    <script>
	$(document).on('pageshow', function(){ 					
		//Form validation
		$(document).on('click', '#submitBtn', function() { 
			if (!$('#usernamae').val()) {
				alert("กรุณากรอกชื่อ");
				$('#username').focus();
				return false;
			}
			if (!$('#lastname').val()) {
				alert("กรุณากรอกนามสกุล");
				$('#lastname').focus();
				return false;
			}
			if (!$('#address').val()) {
				alert("กรุณากรอกที่อยู่");
				$('#address').focus();
				return false;
			}
			if (!$('#tel').val()) {
				alert("กรุณากรอกเบอร์โทรศัพท์");
				$('#tel').focus();
				return false;
			}
			if (!$('#email').val()) {
				alert("กรุณากรอกอีเมล์");
				$('#email').focus();
				return false;
			}
		});
	});
	</script>
</head> 
<body> 

<div data-role="page">
<?
	include ("config.ini.php");	

?>
      <div data-role="header">
		<a href="mindex.php" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
		<h1>ลงทะเบียนสมาชิก</h1>
	</div><!-- /header -->

		<div class="content" data-role="content">
			<form action="mb_saveregister.php" method="post">
				<div data-role="fieldcontain">
					 <label for="username">ชื่อผู้ใช้งาน</label>
					 <input type="text" name="username" id="username">
				</div>
				<div data-role="fieldcontain">
					 <label for="password">รหัสผ่าน</label>
					 <input type="password" name="password" id="password">
				</div>
				<div data-role="fieldcontain">
					 <label for="confirmpwd">ยืนยันรหัสผ่าน</label>
					 <input type="password" name="confirmpwd" id="confirmpwd">
				</div>
				<div data-role="fieldcontain">
					<label for="name">ชื่อ-นามสกุล</label>
					<input type="text" name="name" id="name">
				</div>
				<div data-role="fieldcontain">
					 <label for="address">ที่อยู่</label>
					 <textarea name="address" id="address"></textarea>
				</div>
				<div data-role="fieldcontain">
					 <label for="sandid">จังหวัด</label>
			  <select id="sandid" name="sandid" >
                    	<!--<option value="0" data-placeholder="true">กรุณาเลือกข้อมูลทราย</option> -->                                             
                            <?
                                    $mysql = "SELECT provinceid,provincename FROM tblprovince ORDER BY provinceid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                            <option value="<?=$row[provinceid]?>"  <?=$data[provinceid]==$row[provinceid] ? "selected = selected" : "''";?> >
                              <?=$row[provincename]?>
                            </option>
                            <? } ?>
                          </select>
				</div>
                
				<div data-role="fieldcontain">
					 <label for="zip">รหัสไปรษณีย์</label>
					 <input type="number" name="zip" id="zip">
				</div>
				<div data-role="fieldcontain">
					 <label for="phone">เบอร์โทรศัพท์</label>
					 <input type="tel" name="phone" id="phone">
				</div>
				<div data-role="fieldcontain">
					 <label for="email">อีเมล์</label>
					 <input type="email" name="email" id="email">
				</div>
				<input type="submit" value="ลงทะเบียน" data-inline="true">
				<input type="reset" value="ล้างข้อมูล" data-inline="true">
			</form>
		</div>		
</div>
</body>
</html>

<!-- This Code Download from www.ThaiCreate.Com -->