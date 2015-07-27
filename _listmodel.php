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
<style type="text/css">
<!--
body {
	background-image: url(images/images.jpeg);
}
-->
</style>
<script type="text/javascript">

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
                      <td align="center" valign="top"><table width="562" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="38" colspan="3" background="images/bar.gif" class="txtwhitebold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รุ่นรถจักรยานยนต์</td>
                          </tr>
                        <tr>
                          <td width="4" height="192" background="images/barleft.gif">&nbsp;</td>
                          <td width="584" valign="top">
							<table width="100%" border="0" cellspacing="1" cellpadding="2">
								  <?
                                        $strsql="SELECT tblmodel.* FROM tblmodel  ";
                                        $strsql = $strsql." ORDER BY tblmodel.modelid DESC ";
                                        $myrs = mysql_query($strsql);
                                        $cnt=1;
                                        echo "<tr>";
                                        while ($row=mysql_fetch_assoc($myrs)){
                                  ?>                                
                                    <td width="20%" align="center" valign="top" class="tablecomment" onmouseover="this.style.backgroundColor='FFFF99';" onmouseout="this.style.backgroundColor=''">
                                    <a class="a1" href="modeldetail.php?id=<?=$row['modelid']?>" target="_blank"><img src="picture/<?=$row['picshow01']?>" width="160" height="120" /><br/><?=$row['modelname']?></a>                                    
                                    </td>
                                    <? if ($cnt%2==0){	                                    
                                  		echo "</tr><tr>";
                                     } 
                                    $cnt++;
								  } ?>
                                </table>                          </td>
                          <td width="4" background="images/barright.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="483"><img src="images/b_bar.gif" width="483" height="30" /></td>
                              <td width="79"><img src="images/b_right_corner.gif" width="79" height="30" /></td>
                            </tr>
                          </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>                </td>
                <td width="197" valign="top" class="tablecomment_l_r">
                <? include("blocklogin.php") ?>
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
