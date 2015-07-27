<?
	session_start();
	include ("config.ini.php");	
	if ($_GET['logoff']=='true') {
		unset($_SESSION[username]);
		unset($_SESSION[usertype]);
	}
	
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
			if ($_SESSION[userlevel]=='00') {
			echo "<meta http-equiv='refresh' content='0;URL=_admin.php'>"; 
			} else if ($_SESSION[userlevel]=='01') {
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>"; 
			}
			
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
                                        $strsql = $strsql." ORDER BY tblmodel.modelid DESC LIMIT 0,6 ";
                                        $myrs = mysql_query($strsql);
                                        $cnt=1;
                                        echo "<tr>";
                                        while ($row=mysql_fetch_assoc($myrs)){
                                  ?>                                
                                    <td width="20%" align="center" valign="top" class="tablecomment" onmouseover="this.style.backgroundColor='FFFF99';" onmouseout="this.style.backgroundColor=''">
                                    <a class="a1" href="modeldetail.php?id=<?=$row['modelid']?>" ><img src="picture/<?=$row['picshow01']?>" width="160" height="120" /><br/><?=$row['modelname']?></a>                                    
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
                              <td width="79"><a href="_listmodel.php"><img src="images/all.gif" width="79" height="30" /></a></td>
                            </tr>
                          </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>
<table width="100%" border="0" cellspacing="2" cellpadding="1">
                      
                      <tr>
                        <td height="42" background="images/bbar.gif" class="txtwhitebold"><img src="images/news-21.png" width="130" height="36" /></td>
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
                                <td height="169" valign="top" background="images/boxleft.gif">&nbsp;</td>
                                <td valign="top">
							<table width="100%" border="0" cellspacing="1" cellpadding="1">
							  <?
                                    $strsql="SELECT tblnews.* FROM tblnews ";
                                    $strsql = $strsql." ORDER BY tblnews.newsid DESC LIMIT 0,5 ";
                                    $myrs = mysql_query($strsql);
                                    $cnt=1;
                                    while ($row=mysql_fetch_assoc($myrs)){
                              ?>
                            
                              <tr>
                                <td width="10%" align="right" class="tbline_menu_dash"><img src="png/yellow-03.png" width="24" height="24" /></td>
                                <td width="90%" align="left" class="tbline_menu_dash"><a class="a1"  href="newsdetail.php?id=<?=$row[newsid]?>" target="_blank"><?=$row[newsname]?></a></td>
                              </tr>
                              <? } ?>
                              <tr>
                                <td align="right">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>                                </td>
                                <td valign="top" background="images/boxright.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/box03.gif" width="21" height="24" /></td>
                                <td valign="top" background="images/boxbottom.gif">&nbsp;</td>
                                <td valign="top"><img src="images/box04.gif" width="23" height="24" /></td>
                              </tr>
                            </table>                        </td>
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
