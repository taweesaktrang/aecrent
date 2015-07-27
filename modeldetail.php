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
						<?
							 $modelid = $_GET['id'];
                             $query = "SELECT tblmodel.*,tblyeehor.yeehorname FROM tblmodel Inner Join tblyeehor ON tblmodel.yeehorid = tblyeehor.yeehorid ";
                             $query = $query." WHERE modelid='".$_GET['id']."'";
                             $rs = mysql_query($query);
                             $item = mysql_fetch_assoc($rs);
                        ?>
                <td width="592" valign="top" class="tablecomment_l_r">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="top"><table width="562" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="38" colspan="3" background="images/barlong.gif" class="txtwhitebold">&nbsp;&nbsp;&nbsp;<?=$item['yeehorname']." : ".$item['modelname']?></td>
                          </tr>
                          
                          
                        <tr>
                          <td width="4" height="192" background="images/barleft.gif">&nbsp;</td>
                          <td width="584" valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top">
                                
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="21" valign="top"><img src="images/box01.gif" width="21" height="19" /></td>
                                <td width="598" valign="top" background="images/boxtop.gif">&nbsp;</td>
                                <td width="21" valign="top"><img src="images/box02.gif" width="23" height="19" /></td>
                              </tr>
                              <tr>
                                <td height="169" valign="top" background="images/boxleft.gif">&nbsp;</td>
                                <td valign="top">
							<table width="100%" border="0" cellspacing="1" cellpadding="1">
                            
                                  <tr>
                                    <td width="25%" align="right" valign="middle" class="tbline_menu_dash"><span class="text01">ยี่ห้อรถจักรยานยนต์ :</span></td>
                                    <td width="54%" align="left" valign="middle" class="tbline_menu_dash"><?=$item['yeehorname']?></td>
                                    <td width="21%" align="left" valign="middle" class="tbline_menu_dash">
                                    <? if (!empty($_SESSION[username])) { ?>
                                    <div class="add2cart_botton"><a href="booking.php?id=<?=$modelid?>">จองรถ</a></div></div>
                                    <? } ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="25%" align="right" valign="middle" class="tbline_menu_dash"><span class="text01">รุ่นรถจักรยานยนต์ :</span></td>
                                    <td colspan="2" align="left" valign="middle" class="tbline_menu_dash"><?=$item['modelname']?></td>
                                    </tr>
                                  <tr>
                                    <td width="25%" height="40" align="right" valign="middle" class="tbline_menu_dash"><span class="text01">รายละเอียดอื่น :</span></td>
                                    <td colspan="2" align="left" valign="middle" class="tbline_menu_dash"><?=$item['detail']?></td>
                                    </tr>
                              <tr>
                                <td align="right">&nbsp;</td>
                                <td colspan="2" align="left">&nbsp;</td>
                                </tr>
                            </table>                                </td>
                                <td valign="top" background="images/boxright.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/box03.gif" width="21" height="24" /></td>
                                <td valign="top" background="images/boxbottom.gif">&nbsp;</td>
                                <td valign="top"><img src="images/box04.gif" width="23" height="24" /></td>
                              </tr>
                            </table>                                
                                
                                </td>
                              </tr>
                              <tr>
                                <td align="center" valign="top">

                            <table width="100%" border="0" cellspacing="2" cellpadding="1">
                              <tr>
                                <td width="33%" align="center" valign="top" class="tbline_b_dash">
                                
                                <? if (!empty($item['picshow01'])) { ?>
    							<a href="picture/<?=$item['picshow01']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$item['picshow01']?>" width="160" height="120" /></a>
                                <? } ?>                                </td>
                                <td width="34%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($item['picshow02'])) { ?>
    							<a href="picture/<?=$item['picshow02']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$item['picshow02']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                              </tr>
                              <tr>
                                <td width="33%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($item['picshow03'])) { ?>
    							<a href="picture/<?=$item['picshow03']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$item['picshow03']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                                <td align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($item['picshow04'])) { ?>
    							<a href="picture/<?=$item['picshow04']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$item['picshow04']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                              </tr>
                              <tr>
                                <td width="33%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($item['picshow05'])) { ?>
    							<a href="picture/<?=$item['picshow5']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$item['picshow05']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                                <td width="34%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($item['picshow06'])) { ?>
    							<a href="picture/<?=$item['picshow06']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$item['picshow06']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                              </tr>
                              
                            </table>                        

                                
                                </td>
                              </tr>
                            </table>

                          </td>
                          <td width="4" background="images/barright.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3"></td>
                          </tr>
                      </table></td>
                    </tr>
                    
                    <tr>
                      <td><img src="images/barbbbb.gif" width="562" height="7" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>                </td>
                <td width="197" valign="top" class="tablecomment_l_r"><table width="100%" border="0" cellpadding="1" cellspacing="2" class="tbline_menu_dash">
                  <tr>
                    <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3"><img src="images/member.gif" width="196" height="53" /></td>
                  </tr>
                  <tr>
                    <td width="12" height="113" background="images/l_login.gif">&nbsp;</td>
                    <td width="176" valign="top" bgcolor="#F9F9F9">
<table width="100%" border="0" cellpadding="1" cellspacing="2" class="tablecomment">
                          <tr>
                            <td>
                            <form id="frmlogin" name="frmlogin" method="POST" action="" onsubmit="return checktxt()">
                            <input name="login" type="hidden" value="yes" />
                              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                                
                                <tr>
                                  <td align="left" bgcolor="#FCFCFC">รหัสผู้ใช้</td>
                                </tr>
                                <tr>
                                  <td align="left" bgcolor="#FCFCFC"><label>
                                    <input name="txtusername" type="text" class="inputtext" id="txtusername" />
                                  </label></td>
                                </tr>
                                <tr>
                                  <td align="left" bgcolor="#FCFCFC">รหัสผ่าน</td>
                                </tr>
                                <tr>
                                  <td align="left" bgcolor="#FCFCFC"><label>
                                    <input name="txtpassword" type="password" class="inputtext" id="txtpassword" />
                                  </label></td>
                                </tr>
                                <tr>
                                  <td colspan="2" align="center" bgcolor="#FCFCFC"><label>
                                    <input type="submit" name="button" id="button" value="เข้าสู่ระบบ" />
                                  </label></td>
                                  </tr>
                                <tr>
                                  <td height="27" colspan="2" align="center" bgcolor="#F9FAFA"><a href="register.php">สมัครสมาชิก</a></td>
                                  </tr>
                              </table>
                              </form>                            </td>
                          </tr>
                        </table>                    </td>
                    <td width="9" background="images/rmenu.gif">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><img src="images/blogin.gif" width="196" height="21" /></td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                </table>                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><a href="http:\\www.agoda.com" target="_blank"><img src="images/banner_agoda2.gif" alt="www.agoda.com" width="195" height="83" /></a></td>
                  </tr>
                  <tr>
                    <td valign="top"><a href="http:\\www.booking.com" target="_blank"><img src="images/Pretoria-booking-banner.jpg" alt="www.booking.com" width="195" height="163" /></a></td>
                  </tr>
                  <tr>
                    <td valign="top"><a href="http:\\www.sawasdee.com" target="_blank"><img src="images/sawasdee.jpg" alt="www.sawasdee.com" width="195" height="70" /></a></td>
                  </tr>
                  <tr>
                    <td valign="top">&nbsp;</td>
                  </tr>
                </table></td>
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
