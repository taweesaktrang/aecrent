<?
	session_start();
	include ("config.ini.php");	
	$placeid = $_REQUEST['placeid'];
	$action = $_REQUEST['action'];
	if ($action == "new") {
		$txtsql = "SELECT max(tblplace.placeid) as maxid FROM tblplace ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$placeid =substr($data['maxid']+100001,1,5);
	
	}else if ($action == "edit") {
		$txtsql = "SELECT tblplace.* FROM tblplace WHERE tblplace.placeid ='".$placeid."' ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$placeid = $data['placeid'];
	}
	
		
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
	window.location.href = '_place.php?action=delete&placeid='+id;
}

function savedata(){
	// check required
	var f = document.forms['frmdata'];
	if(f.placename.value==''){
		alert('ชื่อสถานที่ท่องเที่ยวเป็นช่องว่าง กรุณากรอกข้อมูลด้วยค่ะ');
		f.placename.focus(); 
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
                            <a  href="_place.php?action=new"><img src="png/blue-02.png" width="32" height="32" /></a><br />
                            <a  href="_place.php?action=new">เพิ่มรายการ</a>
                            </td>
                            <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01">การจัดการข้อมูลสถานที่ท่องเที่ยว</span></td>
                            <? } ?>
                           	<? if (!empty($action)) { ?>
                           <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01"><?=$action=="new" ? "การเพิ่มข้อมูลสถานที่ท่องเที่ยว" : "การแก้ไขข้อมูลสถานที่ท่องเที่ยว"?></span></td>
                           <td width="15%" align="center">
                           <a class="a1" href="javascript:savedata()"><img src="png/green-36.png" width="32" height="32" /></a><br />
                            <a class="a1" href="javascript:savedata()">บันทึกข้อมูล</a>
                            </td>
                            <? } ?>
                            <td width="15%" align="center"><a  href="_place.php"><img src="png/yellow-25.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_place.php">ย้อนกลับ</a></td>
                            <td width="15%" align="center"><a  href="_admin.php"><img src="png/red-27.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_admin.php">เมนูหลัก</a></td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      
                      
                      <? //ส่วนของฟอร์มกรอกข้อมูล ?>
                      <? if (!empty($action)) { //เงื่อนไขตรวจสอบค่าว่างของตัวแปร $action ?>
                      <tr>
                        <td class="tablecomment">
                        <form action="" method="post" enctype="multipart/form-data" name="frmdata" id="frmdata" onsubmit="return checkblank()">
                        <input name="save" type="hidden" value="yes" />
                        <input name="action" type="hidden" value="<?=$action?>" />
                          <table width="100%" border="0" cellpadding="1" cellspacing="2" bgcolor="#F9F9F9" class="tabletopic2">
                            
                            <tr>
                              <td width="21%" align="right" class="tbline_b_dash">รหัส :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <input name="placeid" type="text" value="<?=$placeid?>" readonly="readonly" class="readonly_" id="placeid" size="5" maxlength="5" />
                              </label></td>
                            </tr>
                            <tr>
                              <td width="21%" align="right" class="tbline_b_dash">ชื่อสถานที่ท่องเที่ยว :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <input name="placename" type="text" value="<?=$data['placename']?>" class="inputtext" id="placename" size="70" maxlength="80" />
                              </label></td>
                            </tr>
                            <tr>
                              <td width="21%" align="right" valign="top" class="tbline_b_dash">รายละเอียด :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <textarea name="detail" cols="70" rows="6" class="inputtext" id="detail"><?=$data['detail']?>
                                </textarea>
                              </label></td>
                            </tr>
                            <tr>
                              <td width="21%" align="right" valign="top" class="tbline_b_dash">ตำแหน่งที่ตั้ง :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <textarea name="location" cols="70" rows="6" class="inputtext" id="location"><?=$data['location']?>
                                </textarea>
                              </label></td>
                            </tr>
                            
                            <tr>
                              <td width="21%" align="right" class="tbline_b_dash">รูปภาพประกอบ :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <input name="picfile[]" type="file"  class="inputtext" id="picfile[]" />
                              </label></td>
                            </tr>
                            <tr>
                              <td width="21%" align="right" class="tbline_b_dash">รูปภาพประกอบ :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <input name="picfile[]" type="file"  class="inputtext" id="picfile[]" />
                              </label></td>
                            </tr>
                            <tr>
                              <td width="21%" align="right" class="tbline_b_dash">รูปภาพประกอบ :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <input name="picfile[]" type="file"  class="inputtext" id="picfile[]" />
                              </label></td>
                            </tr>
                            <tr>
                              <td width="21%" align="right" class="tbline_b_dash">รูปภาพประกอบ :</td>
                              <td width="79%" class="tbline_b_dash"><label>
                                <input name="picfile[]" type="file"  class="inputtext" id="picfile[]" />
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
                      <tr>
                      <td>
                            <table width="100%" border="0" cellspacing="2" cellpadding="1">
                              <tr>
                                <td width="33%" align="center" valign="top">
                                
                                <? if (!empty($data['picture01'])) { ?> <a  href="picture/<?=$data['picture01']; ?>" class="lightbox"  rel="me"><img src="picture/<?=$data['picture01']?>" width="160" height="120" /></a><? } ?>                                </td>
                                <td width="34%" align="center" valign="top">
                                <? if (!empty($data['picture02'])) { ?>
    							<a  href="picture/<?=$data['picture02']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picture02']?>" width="160" height="120" />                                </a>
                                <? } ?>                                
                                </td>
                                </tr>
                              <tr>
                                <td align="center" valign="top">
                                <? if (!empty($data['picture03'])) { ?>
    							<a  href="picture/<?=$data['picture03']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picture03']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                                <td align="center" valign="top">
                                <? if (!empty($data['picture04'])) { ?>
    							<a  href="picture/<?=$data['picture04']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picture04']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                                </tr>
                            </table>                      
                      
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
                              <td width="32%" align="right" bgcolor="#0A9CFF">ค้นหาชื่อสถานที่ท่องเที่ยว:</td>
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
                            <td width="57%" align="center" bgcolor="#F9F9F9" class="txt01">ชื่อสถานที่ท่องเที่ยว</td>
                            <td width="21%" align="center" bgcolor="#F9F9F9" class="txt01">รูปภาพ</td>
                            <td width="13%" align="center" bgcolor="#F9F9F9" class="txt01">เลือกคำสั่ง</td>
                          </tr>
							<?
                                $txtsql = "SELECT tblplace.* FROM tblplace  ";
                                if ($_POST['statusfind'] =="ok") {
                                    $txt = "";
                                    if (!empty($_POST['txtfind'])) {
                                        $txt = $txt."WHERE tblplace.placename like '%".$_POST['txtfind']."%'";
                                    }
                                }
                                $txtsql = $txtsql.$txt." ORDER BY placeid ";
                                $txtrs = mysql_query($txtsql);
                                $i=1;
                                while ($row=mysql_fetch_assoc($txtrs)){ //
                                //$name = $row['custname']." ".$row['custsname'];
                            ?>                                                            
                                  <tr>
                                    <td align="center" bgcolor="#FCFCFD" class="text01"><?=$i++?></td>
                                    <td align="left" bgcolor="#FCFCFD" class="text01"><?=$row['placename']?></td>
                                    <td align="center" bgcolor="#FCFCFD"><? if (!empty($row['picture01'])) { ?><a  href="picture/<?=$row['picture01']; ?>" class="lightbox"  rel="me"><img src="picture/<?=$row['picture01']?>" width="160" height="120" /></a><? } ?></td>
                                    <td align="center" bgcolor="#FCFCFD"><a  href="_place.php?action=edit&placeid=<?=$row['placeid']?>"><img src="png/green-22.png" width="24" height="24" /></a> |<a  href="#" onClick="javascript:if(confirm('คุณต้องการลบข้อมูล ใช่หรือไม่?')==true){window.location='_place.php?action=delete&placeid=<?=$row["placeid"];?>';}"> <img src="png/red-16.png" width="24" height="24" /></a></td>
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
		$txtsql="DELETE FROM tblplace  WHERE placeid='".$placeid."'";		
		mysql_query($txtsql) or die(mysql_error());
		$msg = "ลบข้อมูลสถานที่ท่องเที่ยวจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_place.php'>";		
		exit();																		
	}
	if ($_POST['save']=="yes") {
		//$name = $row['custname']." ".$row['custsname'];
		if ($action=="new") {		
			foreach($_FILES[picfile][name] AS $i => $filepic) {   
				if ($filepic != '') { //   
					$extension = explode(".",$filepic);  
					$picfile[$i]="p".$_POST['placeid']."_".$i.".".$extension[1];
					copy($_FILES[picfile][tmp_name][$i],"picture/".$picfile[$i]);
				} else {
					$picfile[$i]="";
				} 
			}			
		
			$txtsql = "insert into tblplace (placeid,placename,detail,location,travel,picture01,picture02,picture03,picture04) values('".$_POST['placeid']."','".$_POST['placename']."','".$_POST['detail']."','".$_POST['location']."','".$_POST['travel']."','".$picfile[0]."','".$picfile[1]."','".$picfile[2]."','".$picfile[3]."' ) ";
			mysql_query($txtsql) or die(mysql_error());
		} else {
			$txtsql = "update tblplace set placename ='".$_POST['placename']."',detail ='".$_POST['detail']."',location ='".$_POST['location']."',travel ='".$_POST['travel']."' ";
			foreach($_FILES[picfile][name] AS $i => $filepic) {  
				if ($filepic != '') { // ตรวจสอบว่ามีการเลือกไฟล์มาหรือไม่  
					$extension = explode(".",$filepic);
					$picfile[$i]="p".$_POST['placeid']."_".$i.".".$extension[1];
					copy($_FILES[picfile][tmp_name][$i],"picture/".$picfile[$i]);
					$cnt = substr($i+101,1,2);
					$txtsql = $txtsql.",picture".$cnt."='".$picfile[$i]."'";
				} 
			}			
			$txtsql = $txtsql." WHERE placeid ='".$placeid."' ";
			
			mysql_query($txtsql) or die(mysql_error());
		}
		$msg = "บันทึกข้อมูลสถานที่ท่องเที่ยวจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_place.php'>";		
			
	}

?>

</body>
</html>
