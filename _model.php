<?
	session_start();
	include ("config.ini.php");	
	$modelid = $_REQUEST['modelid'];
	$action = $_REQUEST['action'];
	if ($action == "new") {
		$txtsql = "SELECT max(tblmodel.modelid) as maxid FROM tblmodel ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$modelid =substr($data['maxid']+1001,1,3);
	
	}else if ($action == "edit") {
		$txtsql = "SELECT tblmodel.* FROM tblmodel WHERE tblmodel.modelid ='".$modelid."' ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$modelid = $data['modelid'];
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
	window.location.href = '_model.php?action=delete&modelid='+id;
}

function savedata(){
	// check required
	var f = document.forms['frmdata'];
	if(f.modelname.value==''){
		alert('ชื่อรุ่นจักรยานยนต์เป็นช่องว่าง กรุณากรอกข้อมูลด้วยค่ะ');
		f.modelname.focus(); 
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
                            <a class="a1" href="_model.php?action=new"><img src="png/blue-02.png" width="32" height="32" /></a><br />
                            <a class="a1" href="_model.php?action=new">เพิ่มรายการ</a>
                            </td>
                            <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01">การจัดการข้อมูลรุ่นรถจักรยานยนต์</span></td>
                            <? } ?>
                           	<? if (!empty($action)) { ?>
                           <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01"><?=$action=="new" ? "การเพิ่มข้อมูลรุ่นรถจักรยานยนต์" : "การแก้ไขข้อมูลรุ่นรถจักรยานยนต์"?></span></td>
                           <td width="15%" align="center">
                           <a class="a1" href="javascript:savedata()"><img src="png/green-36.png" width="32" height="32" /></a><br />
                            <a class="a1" href="javascript:savedata()">บันทึกข้อมูล</a>
                            </td>
                            <? } ?>
                            <td width="15%" align="center"><a class="a1" href="_model.php"><img src="png/yellow-25.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_model.php">ย้อนกลับ</a></td>
                            <td width="15%" align="center"><a class="a1" href="_admin.php"><img src="png/red-27.png" width="32" height="32" /></a><br />
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
                              <td width="24%" align="right" class="tbline_b_dash">รหัสรุ่นจักรยานยนต์ :</td>
                              <td width="80%" class="tbline_b_dash"><label>
                                <input name="modelid" type="text" value="<?=$modelid?>" class="readonly" readonly="readonly" id="modelid" size="2" maxlength="2" />
                              </label></td>
                            </tr>
                            <tr>
                              <td align="right" class="tbline_b_dash">ชื่อรุ่นจักรยานยนต์ :</td>
                              <td class="tbline_b_dash"><label>
                                <input name="modelname" type="text" value="<?=$data['modelname']?>" class="inputtext" id="modelname" size="60" maxlength="80" />
                              </label></td>
                            </tr>
                            <tr>
                              <td align="right" class="tbline_b_dash">ยี่ห้อจักรยานยนต์ :</td>
                              <td class="tbline_b_dash">
                              <label>
                               <select id="yeehorid" name="yeehorid" class="inputtext">
                               <?
                                    $mysql = "SELECT yeehorid,yeehorname  FROM tblyeehor  ORDER BY yeehorid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>                               		
                                    <option value="<?=$row[yeehorid]?>"  <?=$data[yeehorid]==$row[yeehorid] ? "selected = selected" : "''";?> ><?=$row[yeehorname]?></option>
                               <? } ?>
                               </select>
                              </label>
                              
                              <label>                              </label></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" class="tbline_b_dash">รายละเอียด :</td>
                              <td class="tbline_b_dash"><textarea name="detail" cols="60" rows="3" class="inputtext" id="detail"><?=$data['detail']?></textarea></td>
                            </tr>
                            <!--<tr>
                              <td align="right" valign="top" class="tbline_b_dash">รายละเอียด :</td>
                              <td class="tbline_b_dash"><label>
                                <textarea name="detail" cols="60" rows="10" class="inputtext" id="detail"><?//=$data['detail']?></textarea>
                              </label></td>
                            </tr>-->
                            
                            <tr>
                              <td align="right">ราคาค่าเช่ารถ / ชม.:</td>
                              <td><label>
                                <input name="price" type="text" class="inputtext" id="price" size="10" maxlength="10" value="<?=number_format($data['price'])?>" />
                              </label></td>
                            </tr>
                            <tr>
                              <td align="right">รูปภาพ :</td>
                              <td><input name="picshow[]" type="file" class="inputtext_brown" id="picshow[]"></td>
                            </tr>
                           <tr>
                              <td align="right">รูปภาพ :</td>
                              <td><input name="picshow[]" type="file" class="inputtext_brown" id="picshow[]"></td>
                            </tr>
                            <tr>
                              <td align="right">รูปภาพ :</td>
                              <td><input name="picshow[]" type="file" class="inputtext_brown" id="picshow[]"></td>
                            </tr>
                            <tr>
                              <td align="right">รูปภาพ :</td>
                              <td><input name="picshow[]" type="file" class="inputtext_brown" id="picshow[]"></td>
                            </tr>
                            <tr>
                              <td align="right">รูปภาพ :</td>
                              <td><input name="picshow[]" type="file" class="inputtext_brown" id="picshow[]"></td>
                            </tr>
                            <tr>
                              <td align="right">รูปภาพ :</td>
                              <td><input name="picshow[]" type="file" class="inputtext_brown" id="picshow[]"></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="left">&nbsp;
                            </td>
                              </tr>
                            <tr>
                              <td align="right">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                          </form>                        
                        </td>
                      </tr>
                      <tr><td>
						<table width="100%" border="0" cellspacing="2" cellpadding="1">
                              <tr>
                                <td width="33%" align="center" valign="top" class="tbline_b_dash">
                                
                                <? if (!empty($data['picshow01'])) { ?>
    							<a href="picture/<?=$data['picshow01']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picshow01']?>" width="160" height="120" /></a>
                                <? } ?>                                </td>
                                <td width="34%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($data['picshow02'])) { ?>
    							<a href="picture/<?=$data['picshow02']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picshow02']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                              </tr>
                              <tr>
                                <td width="33%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($data['picshow03'])) { ?>
    							<a href="picture/<?=$data['picshow03']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picshow03']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                                <td align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($data['picshow04'])) { ?>
    							<a href="picture/<?=$data['picshow04']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picshow04']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                              </tr>
                              <tr>
                                <td width="33%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($data['picshow05'])) { ?>
    							<a href="picture/<?=$data['picshow5']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picshow05']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                                <td width="34%" align="center" valign="top" class="tbline_b_dash">
                                <? if (!empty($data['picshow06'])) { ?>
    							<a href="picture/<?=$data['picshow06']; ?>" class="lightbox"  rel="me">
                                <img src="picture/<?=$data['picshow06']?>" width="160" height="120" />                                </a>
                                <? } ?>                                </td>
                              </tr>
                              
                            </table>     
                                             
                      </td>
                      </tr>
                      <? //จบส่วนของฟอร์มกรอกข้อมูล ?>
                      
                      <? } else { ?>                      
                      
                      <? // ส่วนฟอร์มการค้นหาข้อมูล ?>
                      <tr>
                        <td height="20" bgcolor="#F89A16">
                        <form id="form1" name="form1" method="post" action="">
                        <input name="statusfind" type="hidden" value="ok" />
                          <table width="100%" border="0" cellpadding="1" cellspacing="2" bgcolor="#FAB85F"  class="tablecomment">
                            <tr>
                              <td width="32%" align="right">ค้นหาข้อมูลโดย :</td>
                              <td width="68%"><label>
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
                            <td width="12%" align="center" bgcolor="#F9F9F9" class="txt01">รหัสรุ่น</td>
                            <td align="center" bgcolor="#F9F9F9" class="txt01">ชื่อรุ่นจักรยานยนต์</td>
                            <td width="24%" align="center" bgcolor="#F9F9F9" class="txt01">ยี่ห้อ</td>
                            <td width="12%" align="center" bgcolor="#F9F9F9" class="txt01">เลือกคำสั่ง</td>
                          </tr>
							<?
                                $txtsql = "SELECT tblmodel.*,tblyeehor.yeehorname,tblyeehor.yeehorpic FROM tblmodel Inner Join tblyeehor ON tblmodel.yeehorid = tblyeehor.yeehorid ";
                                if ($_POST['statusfind'] =="ok") {
                                    $txt = "";
                                    if (!empty($_POST['txtfind'])) {
                                        $txt = $txt."WHERE tblmodel.modelname like '%".$_POST['txtfind']."%'";
                                    }
                                }
                                $txtsql = $txtsql.$txt." ORDER BY modelid ";
                                $txtrs = mysql_query($txtsql);
                                $i=1;
                                while ($row=mysql_fetch_assoc($txtrs)){ //
                                //$name = $row['custname']." ".$row['custsname'];
                            ?>                                                            
                                  <tr>
                                    <td align="center" bgcolor="#FCFCFD" class="text01"><?=$i++?></td>
                                    <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['modelid']?></td>
                                    <td align="left" bgcolor="#FCFCFD" class="text01"><?=$row['modelname']?></td>
                                    <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['yeehorname']?></td>
                                    <td align="center" bgcolor="#FCFCFD"><a class="a1" href="_model.php?action=edit&modelid=<?=$row['modelid']?>"><img src="png/green-22.png" width="24" height="24" /></a> |<a class="a1" href="#" onClick="javascript:if(confirm('คุณต้องการลบข้อมูล ใช่หรือไม่?')==true){window.location='_model.php?action=delete&modelid=<?=$row["modelid"];?>';}"> <img src="png/red-16.png" width="24" height="24" /></a></td>
                                  </tr>
                             <? } ?>
						  <? if ($i==1) { ?>
                          <tr>
                            <td colspan="5" align="center" bgcolor="#FCFCFD" class="errbox">!!!!! ไม่พบรายการข้อมูล !!!!</td>
                            </tr>
                          <? } ?>
                             
                          <tr>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
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
		$txtsql="DELETE FROM tblmodel  WHERE modelid='".$modelid."'";		
		mysql_query($txtsql) or die(mysql_error());
		$msg = "ลบข้อมูลรุ่นจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_model.php'>";		
		exit();																		
	}
	
	if ($_POST['save']=="yes") {
		if ($action=="new") {
			$txtsql = "SELECT * FROM tblmodel WHERE modelid ='".$modelid."' ";		
			$txtrs = mysql_query($txtsql);
			if (mysql_num_rows($txtrs)!=0) {
				$msg = "รหัสรุ่นจักรยานยนต์ซ้ำ กรุณากรอกใหม่ด้วยครับ";
				echo"<script language=javascript>";
				echo"alert('$msg')"; 
				echo"</script>";
				echo "<meta http-equiv='refresh' content='0;URL=_model.php'>";		
				exit();																		
			}
			
			foreach($_FILES[picshow][name] AS $i => $filepic) {   
				if ($filepic != '') { //   
					$extension = explode(".",$filepic);  
					$picfile[$i]="model".$_POST['modelid']."_".$i.".".$extension[1];
					copy($_FILES[picshow][tmp_name][$i],"picture/".$picfile[$i]);
				} else {
					$picshow[$i]="";
				} 
			}			
					
			$txtsql = "insert into tblmodel (modelid,modelname,yeehorid,price,detail,picshow01,picshow02,picshow03,picshow04,picshow05,picshow06) values('".$_POST['modelid']."','".$_POST['modelname']."','".$_POST['yeehorid']."','".$_POST['price']."','".$_POST['detail']."','".$picfile[0]."','".$picfile[1]."','".$picfile[2]."','".$picfile[3]."','".$picfile[4]."','".$picfile[5]."' ) ";
			mysql_query($txtsql) or die(mysql_error());
		} else {
			$txtsql = "update tblmodel set modelname ='".$_POST['modelname']."',yeehorid ='".$_POST['yeehorid']."',price ='".$_POST['price']."',detail ='".$_POST['detail']."' ";
			foreach($_FILES[picshow][name] AS $i => $filepic) {  
				if ($filepic != '') { // ตรวจสอบว่ามีการเลือกไฟล์มาหรือไม่  
					$extension = explode(".",$filepic);
					$picfile[$i]="model".$_POST['modelid']."_".$i.".".$extension[1];
					copy($_FILES[picshow][tmp_name][$i],"picture/".$picfile[$i]);
					$cnt = substr($i+101,1,2);
					//if ($i==0) {						
						//$txtsql = $txtsql.",detailpicture='".$picfile[$i]."'";
					//} else {
						$txtsql = $txtsql.",picshow".$cnt."='".$picfile[$i]."'";
					//}
				} 
			}			
			$txtsql = $txtsql." WHERE modelid ='".$modelid."' ";
			$myrs = mysql_query($txtsql) or die(mysql_error());			
			
			mysql_query($txtsql) or die(mysql_error());
		}
		$msg = "บันทึกข้อมูลรุ่นจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_model.php'>";		
			
	}

?>

</body>
</html>
