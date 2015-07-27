<?
	session_start();
	include ("config.ini.php");	
	$typeid = $_REQUEST['typeid'];
	$action = $_REQUEST['action'];
	if ($action == "new") {
		$txtsql = "SELECT max(tbltype.typeid) as maxid FROM tbltype ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$typeid =substr($data['maxid']+101,1,2);
	
	}else if ($action == "edit") {
		$txtsql = "SELECT tbltype.* FROM tbltype WHERE tbltype.typeid ='".$typeid."' ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$typeid = $data['typeid'];
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
</style></head>
<script type="text/javascript">
function check_number() {
e_k=event.keyCode
//if (((e_k < 48) || (e_k > 57)) && e_k != 46 ) {
if (e_k != 13 && (e_k < 48) || (e_k > 57)) {
event.returnValue = false;
alert("ต้องเป็นตัวเลขเท่านั้น... \nกรุณาตรวจสอบข้อมูลของคุณอีกครั้ง...");
}
} 
function deletedata(id){
	if(!confirm('คุณต้องการลบข้อมูลใช่หรือไม่'))
		return;
	window.location.href = '_type.php?action=delete&typeid='+id;
}

function savedata(){
	// check required
	var f = document.forms['frmdata'];
	if(f.typename.value==''){
		alert('ชื่อประเภทรถเป็นช่องว่าง กรุณากรอกข้อมูลด้วยค่ะ');
		f.typename.focus(); 
	}else
		f.submit();
}
	
</script>

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
            <td width="190" align="center" valign="middle" background="images/h3_2.gif">&nbsp;</td>
            <td width="504" valign="middle" background="images/h3_2.gif">&nbsp;</td>
            <td width="299" valign="top"><img src="images/h3_3.gif" width="298" height="46" /></td>
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
                <?
					include ("_mainmenu.php");
				?>
                </td>
                <td width="772" valign="top" class="tablecomment_l_r">
<table width="100%" border="0" cellspacing="1" cellpadding="1">
                      
                      <tr>
                        <td>
                        <table width="100%" border="0" cellpadding="1" cellspacing="2" class="tablecomment">
                          <tr>
                          	<? if (empty($action)) { ?>
                            <td width="15%" align="center" valign="middle">
                            <a class="a1" href="_type.php?action=new"><img src="png/blue-02.png" width="32" height="32" /></a><br />
                            <a class="a1" href="_type.php?action=new">เพิ่มรายการ</a>
                            </td>
                            <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01">การจัดการข้อมูลประเภทรถจักรยานยนต์</span></td>
                            <? } ?>
                           	<? if (!empty($action)) { ?>
                           <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01"><?=$action=="new" ? "การเพิ่มข้อมูลประเภทรถ" : "การแก้ไขข้อมูลประเภทรถ"?></span></td>
                           <td width="15%" align="center">
                           <a class="a1" href="javascript:savedata()"><img src="png/green-36.png" width="32" height="32" /></a><br />
                            <a class="a1" href="javascript:savedata()">บันทึกข้อมูล</a>
                            </td>
                            <? } ?>
                            <td width="15%" align="center"><a class="a1" href="_type.php"><img src="png/yellow-25.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_type.php">ย้อนกลับ</a></td>
                            <td width="15%" align="center"><a class="a1" href="admin.php"><img src="png/red-27.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="admin.php">เมนูหลัก</a></td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      
                      
                      <? //ส่วนของฟอร์มกรอกข้อมูล ?>
                      <? if (!empty($action)) { //เงื่อนไขตรวจสอบค่าว่างของตัวแปร $action ?>
                      <tr>
                        <td class="tablecomment">
                        <form id="frmdata" name="frmdata" method="post" action="" onsubmit="return checkblank()">
                        <input name="save" type="hidden" value="yes" />
                        <input name="action" type="hidden" value="<?=$action?>" />
                          <table width="100%" border="0" cellpadding="1" cellspacing="2" bgcolor="#F9F9F9" class="tabletopic2">
                            <tr>
                              <td width="20%" align="right" class="tbline_b_dash">รหัสประเภทรถ :</td>
                              <td width="80%" class="tbline_b_dash"><label>
                                <input name="typeid" type="text" value="<?=$typeid?>" class="readonly" readonly="readonly" id="typeid" size="2" maxlength="2" />
                              </label></td>
                            </tr>
                            <tr>
                              <td align="right" class="tbline_b_dash">ชื่อประเภทรถ :</td>
                              <td class="tbline_b_dash"><label>
                                <input name="typename" type="text" value="<?=$data['typename']?>" class="inputtext" id="typename" size="60" maxlength="80" />
                              </label></td>
                            </tr>
                            
                            
                            <tr>
                              <td align="right">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                          </form>                        
                        </td>
                      </tr>
                      <? //จบส่วนของฟอร์มกรอกข้อมูล ?>
                      
                      <? } else { ?>                      
                      
                      <? // ส่วนฟอร์มการค้นหาข้อมูล ?>
                      <tr>
                        <td height="20" bgcolor="#14C5FE">
                        <form id="form1" name="form1" method="post" action="">
                        <input name="statusfind" type="hidden" value="ok" />
                          <table width="100%" border="0" cellpadding="1" cellspacing="2" bgcolor="#0061FE"  class="tablecomment">
                            <tr>
                              <td width="32%" align="right" bgcolor="#0A9CFF">ค้นหาชื่อประเภทรถ:</td>
                              <td width="68%" bgcolor="#0A9CFF"><label>
                           		<input name="txtfind" type="text" class="inputtext" id="txtfind" size="40" maxlength="100" value="<?=$_POST['txtfind']?>"/>
                           		<input type="submit" name="button2" id="button2" value="ค้นหาข้อมูล" />
                              </label></td>
                            </tr>
                          </table>
                         </form>
                        </td>
                      </tr>
                      <? //จบส่วนของฟอร์มค้นหาข้อมูล ?>
                      
                      <? //แสดงรายการข้อมูล ?>
                      <tr>
                        <td>
                        <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#999999" class="tablecomment">
                          <tr>
                            <td width="9%" height="24" align="center" bgcolor="#F9F9F9" class="tbline_b_dash"><span class="txt01">ลำดับที่</span></td>
                            <td width="15%" align="center" bgcolor="#F9F9F9" class="txt01">รหัสประเภทรถ</td>
                            <td align="center" bgcolor="#F9F9F9" class="txt01">ชื่อประเภทรถ</td>
                            <td width="13%" align="center" bgcolor="#F9F9F9" class="txt01">เลือกคำสั่ง</td>
                          </tr>
							<?
                                $txtsql = "SELECT tbltype.* FROM tbltype  ";
                                if ($_POST['statusfind'] =="ok") {
                                    $txt = "";
                                    if (!empty($_POST['txtfind'])) {
                                        $txt = $txt."WHERE tbltype.typename like '%".$_POST['txtfind']."%'";
                                    }
                                }
                                $txtsql = $txtsql.$txt." ORDER BY typeid ";
                                $txtrs = mysql_query($txtsql);
                                $i=1;
                                while ($row=mysql_fetch_assoc($txtrs)){ //
                                //$name = $row['custname']." ".$row['custsname'];
                            ?>                                                            
                                  <tr>
                                    <td align="center" bgcolor="#FCFCFD" class="text01"><?=$i++?></td>
                                    <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['typeid']?></td>
                                    <td align="left" bgcolor="#FCFCFD" class="text01"><?=$row['typename']?></td>
                                    <td align="center" bgcolor="#FCFCFD"><a class="a1" href="_type.php?action=edit&typeid=<?=$row['typeid']?>"><img src="png/green-22.png" width="24" height="24" /></a> |<a class="a1" href="#" onClick="javascript:if(confirm('คุณต้องการลบข้อมูล ใช่หรือไม่?')==true){window.location='_type.php?action=delete&typeid=<?=$row["typeid"];?>';}"> <img src="png/red-16.png" width="24" height="24" /></a></td>
                                  </tr>
                             <? } ?>
						  <? if ($i==1) { ?>
                          <tr>
                            <td colspan="4" align="center" bgcolor="#FCFCFD" class="errbox">!!!!! ไม่พบรายการข้อมูล !!!!</td>
                            </tr>
                          <? } ?>
                             
                          <tr>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      <? //จบส่วนรายการแสดงข้อมูล ?>
                      <? } ?>
                      
                    </table>                
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
<?
	if ($action=="delete") {
		$txtsql="DELETE FROM tbltype  WHERE typeid='".$typeid."'";		
		mysql_query($txtsql) or die(mysql_error());
		$msg = "ลบข้อมูลประเภทรถจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_type.php'>";		
		exit();																		
	}
	if ($_POST['save']=="yes") {
		//$name = $row['custname']." ".$row['custsname'];
		if ($action=="new") {		
			$txtsql = "insert into tbltype (typeid,typename) values('".$_POST['typeid']."','".$_POST['typename']."' ) ";
			mysql_query($txtsql) or die(mysql_error());
		} else {
			$txtsql = "update tbltype set typename ='".$_POST['typename']."' WHERE typeid ='".$typeid."' ";
			mysql_query($txtsql) or die(mysql_error());
		}
		$msg = "บันทึกข้อมูลประเภทรถจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_type.php'>";		
			
	}

?>

</body>
</html>
