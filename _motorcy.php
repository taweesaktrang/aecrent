<?
	session_start();
	include ("config.ini.php");	
	$modelid = $_REQUEST['modelid'];
	$action = $_REQUEST['action'];
	if ($action == "new") {
		$txtsql = "SELECT max(tblmotorcy.motorcyid) as maxid FROM tblmotorcy ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$motorcyid =substr($data['maxid']+1001,1,3);
	
	}else if ($action == "edit") {
		$txtsql = "SELECT tblmotorcy.* FROM tblmotorcy WHERE tblmotorcy.motorcyid ='".$motorcyid."' ";
		$txtrs = mysql_query($txtsql);
		$data = mysql_fetch_assoc($txtrs);
		$motorcyid = $data['motorcyid'];
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
	window.location.href = '_motorcy.php?action=delete&modelid='+id;
}

function savedata(){
	// check required
	var f = document.forms['frmdata'];
	if(f.machineno.value==''){
		alert('ชื่อรถจักรยานยนต์เป็นช่องว่าง กรุณากรอกข้อมูลด้วยค่ะ');
		f.machineno.focus(); 
	}else if(f.typeid.value==''){
		alert('นามสกุลรถจักรยานยนต์เป็นช่องว่าง กรุณากรอกข้อมูลด้วยค่ะ');
		f.typeid.focus(); 
	}else
		f.submit();
}
	
</script>
<?
	if ($action=="delete") {
		$txtsql="DELETE FROM tblmotorcy  WHERE motorcyid='".$motorcyid."'";		
		mysql_query($txtsql) or die(mysql_error());
		$msg = "ลบข้อมูลรถจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_motorcy.php'>";		
		exit();																		
	}
	if ($_POST['save']=="yes") {
		if ($action=="new") {		
			$txtsql = "SELECT * FROM tblmotorcy WHERE motorcyid ='".$motorcyid."' ";		
			$txtrs = mysql_query($txtsql);
			if (mysql_num_rows($txtrs)!=0) {
				$msg = "รหัสรถจักรยานยนต์ซ้ำ กรุณากรอกใหม่ด้วยครับ";
				echo"<script language=javascript>";
				echo"alert('$msg')"; 
				echo"</script>";
				echo "<meta http-equiv='refresh' content='0;URL=_motorcy.php'>";		
				exit();																		
			
			}		
			$txtsql = "insert into tblmotorcy(registerno,chassisno,machineno,typeid,modelid,yeehorid,colorid,ccname,pricecost,description) values('".$_POST['registerno']."','".$_POST['chassisno']."','".$_POST['machineno']."','".$_POST['typeid']."','".$_POST['modelid']."','".$_POST['yeehorid']."','".$_POST['colorid']."','".$_POST['ccname']."','".$_POST['pricecost']."','".$_POST['description']."' ) ";
			mysql_query($txtsql) or die(mysql_error());
		} else {
			$txtsql = "update tblmotorcy set registerno ='".$_POST['registerno']."',chassisno ='".$_POST['chassisno']."',machineno ='".$_POST['machineno']."',typeid ='".$_POST['typeid']."',modelid ='".$_POST['modelid']."',yeehorid ='".$_POST['yeehorid']."',colorid ='".$_POST['colorid']."',ccname ='".$_POST['ccname']."',pricecost ='".$_POST['pricecost']."',description ='".$_POST['description']."' WHERE motorcyid ='".$motorcyid."' ";
			mysql_query($txtsql) or die(mysql_error());
		}
		$msg = "บันทึกข้อมูลรถจักรยานยนต์เรียบร้อยแล้วครับ";
		echo"<script language=javascript>";
		echo"alert('$msg')"; 
		echo"</script>";
		echo "<meta http-equiv='refresh' content='0;URL=_motorcy.php'>";		
			
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
                            <a class="a1" href="_motorcy.php?action=new"><img src="png/blue-02.png" width="32" height="32" /></a><br />
                            <a class="a1" href="_motorcy.php?action=new">เพิ่มรายการ</a>
                            </td>
                            <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01">การจัดการข้อมูลรถจักรยานยนต์</span></td>
                            <? } ?>
                           	<? if (!empty($action)) { ?>
                           <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01"><?=$action=="new" ? "การเพิ่มข้อมูลรุ่นรถจักรยานยนต์" : "การแก้ไขข้อมูลรุ่นรถจักรยานยนต์"?></span></td>
                           <td width="15%" align="center">
                           <a class="a1" href="javascript:savedata()"><img src="png/green-36.png" width="32" height="32" /></a><br />
                            <a class="a1" href="javascript:savedata()">บันทึกข้อมูล</a>
                            </td>
                            <? } ?>
                            <td width="15%" align="center"><a class="a1" href="_motorcy.php"><img src="png/yellow-25.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_motorcy.php">ย้อนกลับ</a></td>
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
                        <form id="frmdata" name="frmdata" method="post" action="" onsubmit="return checkblank()">
                          <input name="save" type="hidden" value="yes" />
                          <input name="action" type="hidden" value="<?=$action?>" />
                          <table width="100%" border="0" cellpadding="1" cellspacing="2" bgcolor="#F9F9F9" class="tabletopic2">
                            
                            <tr>
                              <td align="right" valign="bottom" class="tbline_b_dash">ทำเบียนรถ :</td>
                              <td class="tbline_b_dash"><input name="registerno" type="text" value="<?=$data['registerno']?>" class="inputtext" id="registerno" size="20" maxlength="50" /></td>
                            </tr>
                            <tr>
                              <td width="20%" align="right" valign="bottom" class="tbline_b_dash">เลขตัวถัง  :</td>
                              <td width="80%" class="tbline_b_dash"><label>
                                <input name="chassisno" type="text" value="<?=$data['chassisno']?>" class="inputtext" id="chassisno" size="20" maxlength="50" />
                              &nbsp;เลขเครื่องยนต์ :
                              <input name="machineno" type="text" value="<?=$data['machineno']?>" class="inputtext" id="machineno" size="20" maxlength="50" />
                              </label></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" class="tbline_b_dash">รายละเอียด :</td>
                              <td class="tbline_b_dash"><label>
                              <textarea name="description" cols="100" rows="3" class="inputtext" id="description"><?=$data['description']?>
                              </textarea>
                              </label></td>
                            </tr>
                            
                            <tr>
                              <td align="right" valign="bottom" class="tbline_b_dash">ยี่ห้อรถ :</td>
                              <td class="tbline_b_dash">
                              <label>
                               <select id="yeehorid" name="yeehorid" class="inputtext">
                               <?
                                    $mysql = "SELECT yeehorid,yeehorname  FROM tblyeehor  ORDER BY yeehorid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                    <option value="<?=$row[yeehorid]?>"  <?=$data[yeehorid]==$row[yeehorid] ? "selected = selected" : "''";?> ><?=$row[yeehorname]?></option>
                               <?}?>
                               </select>
                              </label>                               
                              &nbsp;รุ่นรถ :
                              <select id="modelid" name="modelid" class="inputtext">
                                <?
                                    $mysql = "SELECT modelid,modelname  FROM tblmodel  ORDER BY modelid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                <option value="<?=$row[modelid]?>"  <?=$data[modelid]==$row[modelid] ? "selected = selected" : "''";?> >
                                  <?=$row[modelname]?>
                                  </option>
                                <?}?>
                              </select></td>
                            </tr>
                            <tr>
                              <td align="right" valign="bottom" class="tbline_b_dash">สีรถ :</td>
                              <td class="tbline_b_dash">
                              <label>
                               <select id="colorid" name="colorid" class="inputtext">
                               <?
                                    $mysql = "SELECT colorid,colorname  FROM tblcolor  ORDER BY colorid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                    <option value="<?=$row[colorid]?>"  <?=$data[colorid]==$row[colorid] ? "selected = selected" : "''";?> ><?=$row[colorname]?></option>
                               <?}?>
                               </select>
                              </label>                               
                              &nbsp;ประภทรถ :
                              <select id="typeid" name="typeid" class="inputtext">
                                <?
                                    $mysql = "SELECT typeid,typename  FROM tbltype  ORDER BY typeid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                <option value="<?=$row[typeid]?>"  <?=$data[typeid]==$row[typeid] ? "selected = selected" : "''";?> >
                                  <?=$row[typename]?>
                                  </option>
                                <?}?>
                              </select>
                              &nbsp;ขนาด CC : 
                              <select id="ccname" name="ccname" class="inputtext">
                                <?
                                    $mysql = "SELECT ccid,ccname  FROM tblcc  ORDER BY ccid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                <option value="<?=$row[ccname]?>"  <?=$data[ccname]==$row[ccname] ? "selected = selected" : "''";?> >
                                  <?=$row[ccname]?>
                                  </option>
                                <?}?>
                              </select>
                              
                              &nbsp;CC</td>
                            </tr>
                            <!--
                            <tr>
                              <td align="right" valign="bottom" class="tbline_b_dash">วันที่รับรถ :</td>
                              <td class="tbline_b_dash">&nbsp;</td>
                            </tr>
                            -->
                            <tr>
                              <td align="right" valign="bottom" class="tbline_b_dash">ราคาต้นทุน :</td>
                              <td class="tbline_b_dash"><input name="pricecost" type="text" value="<?=$data['pricecost']?>" class="inputtext" id="pricecost" size="20" maxlength="50" />
                                &nbsp;บาท</td>
                            </tr>
                            <tr>
                              <td align="right" valign="bottom" class="tbline_b_dash"></td>
                              <td class="tbline_b_dash"><label>
                                
                                </label>                               </td>
                            </tr>
                            
                            <tr>
                              <td align="right" valign="bottom">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                        </form>                        
                        </td>
                      </tr>
                      <tr><td>&nbsp;</td>
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
                              <td width="16%" align="right">ค้นหาข้อมูลโดย :</td>
                              <td width="84%" >
                              <label>
                               <select id="fyeehorid" name="fyeehorid" class="inputtext">
                               <option value="0" selected="selected"  >-</option>
                               <?
                                    $mysql = "SELECT yeehorid,yeehorname  FROM tblyeehor  ORDER BY yeehorid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                    <option value="<?=$row[yeehorid]?>"  <?=$_POST[fyeehorid]==$row[yeehorid] ? "selected = selected" : "''";?> ><?=$row[yeehorname]?></option>
                               <? } ?>
                               </select>
                               รุ่น :
                              <select id="fmodelid" name="fmodelid" class="inputtext">
                               <option value="0" selected="selected"  >-</option>
                                <?
                                    $mysql = "SELECT modelid,modelname  FROM tblmodel  ORDER BY modelid";
                                    $myrs = @mysql_query($mysql);
                                    while ($row = @mysql_fetch_assoc($myrs)){
                               ?>
                                <option value="<?=$row[modelid]?>"  <?=$_POST[fmodelid]==$row[modelid] ? "selected = selected" : "''";?> >
                                  <?=$row[modelname]?>
                                  </option>
                                <?}?>
                              </select>                               
                              </label>                               
                              
                              <label>
                                <select name="selectfind" class="inputtext" id="selectfind">
                                  <option value="0" <?=$_POST['selectfind']=="0" ? "selected=selected" : ""?>>-</option>
                                  <option value="1" <?=$_POST['selectfind']=="1" ? "selected=selected" : ""?>>เลขตัวถัง</option>
                                  <option value="2" <?=$_POST['selectfind']=="2" ? "selected=selected" : ""?>>เลขเครื่องยนต์</option>
                                </select>
                                <input name="txtfind" type="text" class="inputtext" id="txtfind" size="20" maxlength="100" value="<?=$_POST['txtfind']?>"/>
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
                            <td width="6%" height="24" align="center" bgcolor="#F9F9F9" class="tbline_b_dash"><span class="txt01">ลำดับ</span></td>
                            <td width="12%" align="center" bgcolor="#F9F9F9" class="txt01">ทะเบียนรถ</td>
                            <td width="12%" align="center" bgcolor="#F9F9F9" class="txt01">เลขเครื่องยนต์</td>
                            <td width="13%" align="center" bgcolor="#F9F9F9" class="txt01">ยี่ห้อรถ</td>
                            <td width="31%" align="center" bgcolor="#F9F9F9" class="txt01">รุ่นรถ</td>
                            <td width="16%" align="center" bgcolor="#F9F9F9" class="txt01">ประเภทรถ</td>
                            <td width="10%" align="center" bgcolor="#F9F9F9" class="txt01">เลืือกคำสั่ง</td>
                          </tr>
                          <?
                                $txtsql = "SELECT tblmotorcy.*,tbltype.typename,tblmodel.modelname,tblyeehor.yeehorname,tblcolor.colorname FROM tblmotorcy Inner Join tbltype ON tblmotorcy.typeid = tbltype.typeid Inner Join tblmodel ON tblmotorcy.modelid = tblmodel.modelid Inner Join tblyeehor ON tblmotorcy.yeehorid = tblyeehor.yeehorid Inner Join tblcolor ON tblmotorcy.colorid = tblcolor.colorid ";
                                if ($_POST['statusfind'] =="ok") {
                                    $txt = "";
                                    if ($_POST['fyeehorid']!="0") {
										$txt = "WHERE tblmotorcy.yeehorid ='".$_POST['fyeehorid']."' ";
									}
																		
                                    if ($_POST['fmodelid']!="0") {
										if ($txt=="") {
											$txt = $txt."WHERE ";
										} else {
											$txt=$txt."AND ";
										}
										$txt = $txt."tblmotorcy.modelid ='".$_POST['fmodelid']."' ";
									}									
                                    if (!empty($_POST['txtfind'])) {
										if ($_POST['selectfind']!="0") {
											if ($txt=="") {
												$txt = $txt."WHERE ";
											} else {
												$txt=$txt."AND ";
											}
										}
										
										if ($_POST['selectfind']=="1") {
                                        	$txt = $txt."tblmotorcy.chassisno like '%".$_POST['txtfind']."%'";
										} elseif ($_POST['selectfind']=="2") {
                                        	$txt = $txt."tblmotorcy.machineno like '%".$_POST['txtfind']."%'";										
										}
                                    }
                                }
                                $txtsql = $txtsql.$txt." ORDER BY motorcyid ";
                                $txtrs = mysql_query($txtsql) or die(mysql_error());
                                $i=1;
                                while ($row=mysql_fetch_assoc($txtrs)){ //
                                	$name = $row['machineno']." ".$row['typeid'];
                            ?>
                          <tr>
                            <td align="center" bgcolor="#FCFCFD" class="text01"><?=$i++?></td>
                            <td align="left" bgcolor="#FCFCFD" class="text01"><?=$row['registerno']?></td>
                            <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['machineno']?></td>
                            <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['yeehorname']?></td>
                            <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['modelname']?></td>
                            <td align="center" bgcolor="#FCFCFD" class="text01"><?=$row['typename']?></td>
                            <td align="center" bgcolor="#FCFCFD"><a href="_motorcy.php?action=edit&motorcyid=<?=$row['motorcyid']?>"><img src="png/green-22.png" width="24" height="24" /></a> |<a href="#" onClick="javascript:if(confirm('คุณต้องการลบข้อมูล ใช่หรือไม่?')==true){window.location='_motorcy.php?action=delete&motorcyid=<?=$row["motorcyid"];?>';}"> <img src="png/red-16.png" width="24" height="24" /></a></td>
                          </tr>
                          <? } ?>
                          <? if ($i==1) { ?>
                          <tr>
                            <td colspan="7" align="center" bgcolor="#FCFCFD" class="errbox">!!!!! ไม่พบรายการข้อมูล !!!!</td>
                          </tr>
                          <? } ?>
                          <tr>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
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

</body>
</html>
