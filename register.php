<?
	session_start();
	include ("config.ini.php");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=headname?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="mod/jquery.lightbox/js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="mod/jquery.lightbox/js/lightbox/themes/default/jquery.lightbox.css" />
  <script type="text/javascript" src="mod/jquery.lightbox/js/lightbox/jquery.lightbox.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($){
      $('.lightbox').lightbox();
    });
  </script>

<style type="text/css">
<!--
body {
	background-image: url(images/images.jpeg);
}
-->
</style>
<script type="text/javascript">
function key_onkeypress()
{//65 - 90 ล็อกไม่คี 
	if (event.keyCode <48 || event.keyCode > 57 ){
		alert('โปรดกรอกข้อมูลที่เป็นตัวเลข 0-9');
		event.keyCode = 0
		return false
	} 
} 

function checkdata() {
	if(document.frmreg.musername.value=="") {
		alert("โปรดกรอกข้อมูลชื่อที่ท่านต้องการใช้ในการเข้าระบบด้วยค่ะ") ;
		document.frmreg.musername.focus() ;
		return false ;
	}
	else if(document.frmreg.mpassword.value=="") {
		alert("โปรดกรอกข้อมูลกรอกรหัสผ่านที่ต้องการด้วยค่ะ") ;
		document.frmreg.mpassword.focus() ;
		return false ;
	}
	else if(document.frmreg.mrepassword.value=="") {
		alert("โปรดกรอกข้อมูลยืนยันรหัสผ่านอีกครั้ง") ;
		document.frmreg.mrepassword.focus() ;
		return false ;
	}
	else if(document.frmreg.mpassword.value!=document.frmreg.mrepassword.value) {
		alert("รหัสผ่านไม่ตรงกัน โปรดกรอกข้อมูลยืนยันรหัสผ่านอีกครั้ง ") ;
		document.frmreg.mrepassword.focus() ;
		return false ;
	}
	else if(document.frmreg.memname.value=="") {
		alert("โปรดกรอกข้อมูลกรอกชื่อด้วยค่ะ") ;
		document.frmreg.memname.focus() ;
		return false ;
	}
	else if(document.frmreg.address.value=="") {
		alert("โปรดกรอกข้อมูลกรอกที่อยู่ด้วยค่ะ") ;
		document.frmreg.address.focus() ;
		return false ;
	}
	else if(document.frmreg.provincename.value=="") {
		alert("โปรดกรอกข้อมูลกรอกที่อยู่ด้วยค่ะ") ;
		document.frmreg.provincename.focus() ;
		return false ;
	}
	else if(document.frmreg.zip.value=="") {
		alert("โปรดกรอกข้อมูลกรอกรหัสไปรษณีย์ด้วยค่ะ") ;
		document.frmreg.zip.focus() ;
		return false ;
	}
	else if(document.frmreg.mobile.value=="") {
		alert("โปรดกรอกข้อมูลกรอกเบอร์โทรศัพท์ด้วยนะค่ะ") ;
		document.frmreg.mobile.focus() ;		
		return false ;
	}
	else if(document.frmreg.email.value=="") {
		alert("โปรดกรอกข้อมูลกรอกอีเมล์ด้วยนะค่ะ") ;
		document.frmreg.email.focus();
		return false ;
	}
	else if(document.frmreg.email.value.indexOf('@')==-1) {
		alert("อีเมล์ของคุณไม่ถูกต้องค่ะ") ;
		document.frmreg.email.focus() ;
		return false ;
	}
		else if(document.frmreg.email.value.indexOf('.')==-1) {
		alert("อีเมล์ของคุณไม่ถูกต้องค่ะ") ;
		document.frmreg.email.focus() ;
		return false ;
	}
	else 
		return true ;
	}


function checktxt() {
	if(document.frmlogin.txtusername.value=="") {
		alert("โปรดระบุชื่อในการเข้าระบบด้วยค่ะ") ;
		document.frmlogin.txtusername.focus() ;
		return false ;
	}
	else if(document.frmlogin.txtpassword.value=="") {
		alert("โปรดกรอกรหัสผ่านด้วยค่ะ") ;
		document.frmlogin.txtpassword.focus() ;
		return false ;
	}
	else 
		return true ;
	}
	
</script>


</head>
<?	
	if ($_POST['login']=="yes") {
		$txtsql="SELECT * FROM tbluser WHERE username='".$_POST['txtusername']."' AND upassword ='".$_POST['txtpassword']."' ";
		$txtrs = mysql_query($txtsql) or die(mysql_error());
		$myrs=mysql_fetch_assoc($txtrs);
		if(mysql_num_rows($txtrs)==0){
			echo"<script language=javascript>";
			echo"alert('ชื่อผู้ใช้ไม่ถูกต้อง กรุณากรอกใหม')";
			echo"</script>";
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>"; 
			exit();
		} else {
			$_SESSION[username]=$myrs['username'];
			$_SESSION[fullname]=$myrs['fullname'];
			$_SESSION[userlevel]=$myrs['userlevel'];
			$msg = "ยินดีต้อนรับ คุณ ".$_SESSION[username]." เข้าสู่ระบบ";
			echo"<script language=javascript>";
			echo"alert('$msg')";
			echo"</script>";
			echo "<meta http-equiv='refresh' content='0;URL=_admin.php'>"; 
		}
	}
	
	if ($_POST['save']=='yes') {
				$strsql="SELECT * FROM tbluser WHERE username='".$_POST['musername']."' ";
				$myrs=mysql_query($strsql);
				if (mysql_num_rows($myrs)!=0){
					echo"<script language=javascript>";
					echo"alert('ชื่อผู้ใช้ดังกล่าวมีอยู่แล้ว โปรดระบุชื่อผู้ใช้ใหม่')"; 
					echo"</script>";
					echo "<meta http-equiv='refresh' content='0;URL=register.php'>"; 
					exit();							
				}			
				$strsql = "INSERT INTO tblmember(titlename,membername,address,provinceid,email,telephone,zip,username) VALUES('".$_POST['titlename']."','".$_POST['membername']."','".$_POST['address']."','".$_POST['provinceid']."','".$_POST['email']."','".$_POST['telephone']."','".$_POST['zip']."','".$_POST['musername']."')";
				mysql_query($strsql) or die(mysql_error());
				$strsql = "INSERT INTO tbluser(username,upassword,fullname,userlevel) VALUES('".$_POST['musername']."','".$_POST['mpassword']."','".$_POST['membername']."','01')";
				mysql_query($strsql) or die(mysql_error());				
					echo"<script language=javascript>";
					echo"alert('บันทึกข้อมูลการสมัครสมาชิกเรียบร้อยครับ')"; 
					echo"</script>";
					echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					exit();															
		}
	
?>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="1007" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
      <tr>
        <td align="center" valign="top"><table width="1007" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5"><img src="images/h1_1.gif" width="5" height="30" /></td>
            <td colspan="3" bgcolor="#281b01">&nbsp;</td>
            <td width="5"><img src="images/h1_3.gif" width="5" height="30" /></td>
          </tr>
          <tr>
            <td><img src="images/h2_1.gif" width="5" height="165" /></td>
            <td width="197" valign="top"><img src="images/h2_2.gif" width="197" height="165" /></td>
            <td width="604" valign="top"><img src="images/h2_3.gif" width="604" height="165" /></td>
            <td width="196" valign="top"><img src="images/h2_4.gif" width="196" height="165" /></td>
            <td valign="top"><img src="images/h2_5.gif" width="5" height="165" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14" valign="top"><img src="images/h3_1.gif" width="14" height="46" /></td>
            <td width="695" align="left" valign="middle" background="images/h3_2.gif">
			<?
				include ("menubar.php");
			?>             
            </td>
            <td width="298" valign="top"><img src="images/h3_3.gif" width="298" height="46" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5"  background="images/left.gif">&nbsp;</td>
            <td width="997"  valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="225" height="300" valign="top" bgcolor="#f9f9f9">
				<? include("webleft.php"); ?>                
                </td>
                <td width="592" valign="top" class="tablecomment_l_r">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                      <td>
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
                      
                      <tr>
                        <td height="42" background="images/bbar.gif" class="txtwhitebold">&nbsp;สมัครสมาชิก</td>
                      </tr>
                      <tr>
                        <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="21" valign="top"><img src="images/box01.gif" width="21" height="19" /></td>
                                <td width="598" valign="top" background="images/boxtop.gif">&nbsp;</td>
                                <td width="21" valign="top"><img src="images/box02.gif" width="23" height="19" /></td>
                              </tr>
                              <tr>
                                <td  valign="top" background="images/boxleft.gif">&nbsp;</td>
                                <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="1">
                                
                                  <tr>
                                    <td align="center" class="tbline_b_dash">
                <form id="frmreg" name="frmreg" method="post" action="" onsubmit="return checkdata()">
                <input name="save" type="hidden" value="yes" />
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr>
                      <td height="24" colspan="2" align="left" bgcolor="#FFFFFF" class="tbline_b_dash">.::::: รายละเอียดการเข้าสู่ระบบ :::::.</td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ชื่อผู้ใช้ :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input name="musername" type="text" class="inputtext_gold" id="musername" size="20" maxlength="20" />
                      </label></td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">รหัสผ่าน :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input name="mpassword" type="password" class="inputtext_gold" id="mpassword" size="20" maxlength="20" />
                      </label></td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ยืนยันรหัสผ่าน :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input name="mrepassword" type="password" class="inputtext_gold" id="mrepassword" size="20" maxlength="20" />
                      </label></td>
                      </tr>
                    <tr>
                      <td height="24" colspan="2" align="left" bgcolor="#FFFFFF" class="tbline_b_dash">.::::: รายละเอียดข้อมูลสมาชิก :::::.</td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ชื่อ - นามสกุล :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
						<select id="titlename" name="titlename">
                                    <?
                                       $mysql = "SELECT titleid,titlename  FROM tbltitle  ORDER BY titleid";
                                       $myrs = @mysql_query($mysql);
                                       while ($row = @mysql_fetch_assoc($myrs)){
                                    ?>
                                    <option value="<?=$row[titlename]?>"  <?=$item[titleid]==$row[titleid] ? "selected = selected" : "''";?> ><?=$row[titlename]?></option>
                                    <?}?>
                            </select>                      
                        <input name="membername" type="text" class="inputtext_gold" id="membername" size="40" maxlength="120" />
                      </label></td>
                      </tr>
                    <tr>
                      <td align="right" valign="top" bgcolor="#FFFFFF" class="tbline_b_dash">ที่อยู่ :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <textarea name="address" cols="50" rows="3" class="inputtext_gold" id="address"></textarea>
                      </label></td>
                      </tr>
                    <tr>
                      <td width="36%" align="right" bgcolor="#FFFFFF" class="tbline_b_dash">จังหวัด :</td>
                      <td width="53%" align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
						<select id="provinceid" name="provinceid" class="inputtext">
                                    <?
                                       $mysql = "SELECT provinceid,provincename  FROM tblprovince  ORDER BY provincename ";
                                       $myrs = @mysql_query($mysql);
                                       while ($row = @mysql_fetch_assoc($myrs)){
                                    ?>
                                    <option value="<?=$row[provinceid]?>"  <?=$item[provinceid]==$row[provinceid] ? "selected = selected" : "''";?> ><?=$row[provincename]?></option>
                                    <?}?>
                            </select>                      </label></td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">มือถือ :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input name="telephone" type="text" class="inputtext_gold" id="telephone" size="10" maxlength="10" onkeypress="key_onkeypress()" />
                      </label></td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">รหัสไปรษณีย์ :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input name="zip" type="text" class="inputtext_gold" id="zip" size="5" maxlength="5" onkeypress="key_onkeypress()" />
                      </label></td>
                      </tr>
                    <tr>
                      <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">อีเมลล์  :</td>
                      <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input name="email" type="text" class="inputtext_gold" id="email" size="50" maxlength="50" />
                      </label></td>
                      </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                        <input type="submit" name="button2" id="button2" value="ยืนยันการสมัครสมาชิก" />
                      </label>
                        <label>
                        <input type="reset" name="button3" id="button3" value="ล้างข้อมูล" />
                        </label></td>
                      </tr>
                  </table>
                              </form>                                    
                                    
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" class="tbline_b_dash">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="center" class="tbline_b_dash">&nbsp;</td>
                                  </tr>
                                </table></td>
                                <td valign="top" background="images/boxright.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/box03.gif" width="21" height="24" /></td>
                                <td valign="top" background="images/boxbottom.gif">&nbsp;</td>
                                <td valign="top"><img src="images/box04.gif" width="23" height="24" /></td>
                              </tr>
                            </table>                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>                      
                    </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>                </td>
                <td width="197" valign="top" class="tablecomment_l_r">
                <? include("loginframe.php") ?>
                </td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9">&nbsp;</td>
                <td class="tablecomment_l_r">&nbsp;</td>
                <td class="tablecomment_l_r">&nbsp;</td>
              </tr>
            </table></td>
            <td width="5" background="images/right.gif">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="90" align="center" valign="top" background="images/footer.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
