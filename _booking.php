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
	if (!empty($status)) {
		$strsql = "SELECT tblbooking.statusid FROM tblbooking WHERE tblbooking.bookingid='".$bookingid."' ";
		$myrs=mysql_query($strsql);
		$item = mysql_fetch_assoc($myrs);
		$statusid = $item['statusid'];
		if ($statusid == '1') {
			$strsql="SELECT tblbooking.*,tblmember.*,tblbooking.statusid,tblstatus.statusname FROM tblbooking Inner Join tblmember ON tblbooking.memberid = tblmember.memberid Inner Join tblstatus ON tblbooking.statusid = tblstatus.statusid " ;
		} elseif ($statusid == '2') {
			$strsql = "SELECT tblbooking.*,tblpayment.*,tblmodel.modelname,tblyeehor.yeehorname,tblmember.titlename,tblmember.membername,tblmember.telephone,tblmember.email,tblstatus.statusname,tblmodel.price,tblbank.bankid,tblbank.bankname FROM tblbooking Inner Join tblstatus ON tblbooking.statusid = tblstatus.statusid Inner Join tblmodel ON tblbooking.modelid = tblmodel.modelid Inner Join tblmember ON tblbooking.memberid = tblmember.memberid Inner Join tblpayment ON tblbooking.bookingid = tblpayment.bookingid Inner Join tblyeehor ON tblmodel.yeehorid = tblyeehor.yeehorid Inner Join tblbank ON tblpayment.bankid = tblbank.bankid ";
		}
		$strsql = $strsql." WHERE tblbooking.bookingid='".$bookingid."' ";
		$myrs=mysql_query($strsql);
		$data = mysql_fetch_assoc($myrs);
	
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
	window.location.href = '_booking.php?action=delete&modelid='+id;
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
                            <!--<td width="15%" align="center" valign="middle">
                            <a class="a1" href="_booking.php?action=new"><img src="png/blue-02.png" width="32" height="32" /></a><br />
                            <a class="a1" href="_booking.php?action=new">เพิ่มรายการ</a>
                            </td>-->
                            <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01">การจัดการข้อมูลการจองรถจักรยานยนต์</span></td>
                            <? } ?>
                           	<? if (!empty($action)) { ?>
                           <td align="center" bgcolor="#F8F8F8" class="tb-line3" ><span class="text01"><?=$action=="new" ? "การเพิ่มข้อมูลรุ่นรถจักรยานยนต์" : "การแก้ไขข้อมูลรุ่นรถจักรยานยนต์"?></span></td>
                           <td width="15%" align="center">
                           <a class="a1" href="javascript:savedata()"><img src="png/green-36.png" width="32" height="32" /></a><br />
                            <a class="a1" href="javascript:savedata()">บันทึกข้อมูล</a>
                            </td>
                            <? } ?>
                            <td width="15%" align="center"><a class="a1" href="_booking.php"><img src="png/yellow-25.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_booking.php">ย้อนกลับ</a></td>
                            <td width="15%" align="center"><a class="a1" href="_admin.php"><img src="png/red-27.png" width="32" height="32" /></a><br />
                                          <a class="a1" href="_admin.php">เมนูหลัก</a></td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      
                      
                      <? //ส่วนของฟอร์มกรอกข้อมูล ?>
                      <? if (!empty($status)) { //เงื่อนไขตรวจสอบค่าว่างของตัวแปร $action ?>
                      <tr>
                        <td class="tablecomment">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="21" valign="top"><img src="images/box01.gif" width="21" height="19" /></td>
                                <td width="789" valign="top" background="images/boxtop.gif">&nbsp;</td>
                                <td width="21" valign="top"><img src="images/box02.gif" width="23" height="19" /></td>
                              </tr>
                              <tr>
                                <td  valign="top" background="images/boxleft.gif">&nbsp;</td>
                                <td valign="top" bgcolor="#FFFFFF">
								<table width="100%" border="0" cellspacing="1" cellpadding="1">
								  <? if ($status=='detail'){ ?>
                                  <tr>
                                    <td>
								<table width="100%" border="0" cellspacing="2" cellpadding="1">
                                <tr>
                                  <td height="28" colspan="2" align="left" class="topic_detail_">กรอกข้อมูลรายละเอียดผู้เช่า</td>
                                  </tr>
                                <tr>
                                  <td width="28%" align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ชื่อ / สกุล:</td>
                                  <td width="72%" align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['membername'])?></td>
                                </tr>
                                
                                
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">มือถือ :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['telephone'])?></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">อีเมลล์ :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['email'])?></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="required style1">&nbsp;</td>
                                  <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td height="28" colspan="2" align="left" class="topic_detail_">รายละเอียดการจอง</td>
                                  </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">วันที่จอง :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=$data['begindate']?></td>
                                </tr>
                              <!-- <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ถึงวันที่ :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="finishdate" type="text" class="inputtext" id="finishdate" size="10" maxlength="10"  value="<?$_GET['action']=="edit" ? $item['finishdate'] : date("d-m-Y")?>" />
                                  </label></td>
                                </tr>-->
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">จำนวนวัน :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['amountday'])?>&nbsp;วัน</td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ค่าเช่าต่อวัน :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['price'])?>&nbsp;บาท</td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ยอดเงิน :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['price'])?>&nbsp;บาท</td>
                                </tr>
                                
                              </table>                                    
                                    
                                    
                                    </td>
                                  </tr>
								  <? } 
								  if ($statusid =='2'){ ?>
                                  <tr>
                                    <td>
                                        
                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">                              
                <tr>
                                               <td height="26" colspan="2" align="left" bgcolor="#FFFEFB" class="textJIB14">&nbsp;รายละเอียดการโอนเงิน</td>
                                      </tr>
                                      <tr>
                                        <td width="28%" align="right" bgcolor="#FFFEFB" class="tbline_b_dash">ชื่อ-สกุลผู้โอน :</td>
                                        <td width="72%" align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><?=htmlspecialchars($data['membername'])?></td>
                                      </tr>
                                      <tr >
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">ธนาคาร :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><?=$data[bankid].' '.$data[bankname]?></td>
                                      </tr>
                                      
                                      <tr>
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">วันที่โอน :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><?=$data['paymentdate']?></td>
                                      </tr>
                                      <tr>
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">จำนวนเงิน :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><?=htmlspecialchars($data['total'])?>
                                          <span class="txt06">บาท</span></td>
                                      </tr>
                                      
                                              <tr>
                                                <td colspan="2" align="center" bgcolor="#FFFEFB" class="tb-line2"><label>
                                                </label></td>
                                    </tr>
                                          </table>
                                    
                                    </td>
                                  </tr>
                                     <? }  ?>
                                </table>
                                </td>
                                <td valign="top" background="images/boxright.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/box03.gif" width="21" height="24" /></td>
                                <td valign="top" background="images/boxbottom.gif">&nbsp;</td>
                                <td valign="top"><img src="images/box04.gif" width="23" height="24" /></td>
                              </tr>
                            </table>                        </td>
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
                        <table width="100%" border="0" cellspacing="1" cellpadding="1">
                          <tr>
                            <td width="5%" height="28" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">ลำดับ</span></td>
                            <td width="8%" height="28" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">BookID</span></td>
                            <td align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">รุ่นรถ</span></td>
                            <td width="11%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">วันที่เช่า</span></td>
                            <td width="8%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">จำนวนวัน</span></td>
                            <td width="9%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">ราคา / วัน</span></td>
                            <td width="10%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">คิดเป็นเงิน</span></td>
                            <td width="16%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">สถานะ</span></td>
                            <td width="12%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">คำสั่ง</span></td>
                          </tr>
							<?
                                $txtsql = "SELECT tblmodel.modelname,tblmember.titlename,tblmember.membername,tblmember.username,tblbooking.*,tblstatus.statusname FROM tblbooking Inner Join tblmember ON tblbooking.memberid = tblmember.memberid Inner Join tblmodel ON tblbooking.modelid = tblmodel.modelid Inner Join tblstatus ON tblbooking.statusid = tblstatus.statusid ";
                                $txtsql = $txtsql.$txt." ORDER BY modelid ";
                                $txtrs = mysql_query($txtsql);
                                $i=1;
                                while ($row=mysql_fetch_assoc($txtrs)){ //
                                //$name = $row['payee']." ".$row['custsname'];
                            ?>                                                            
                                  <tr>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash"><a href="_booking.php?status=detail&bookingid=<?=$row['bookingid']?>" class="a1"><strong>
                                      <?=$i?>
                                    </strong></a></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash"><a href="_booking.php?status=detail&bookingid=<?=$row['bookingid']?>" class="a1"><strong>
                                      <?=$row['bookingid']?>
                                    </strong></a></td>
                                    <td align="left" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB05"><strong>
                                      <?=$row['modelname']?>
                                    </strong></span></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB05"><strong>
                                      <?=$row['begindate']?>
                                    </strong></span></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB05"><strong>
                                      <?=$row['amountday']?>
                                    </strong></span></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB05"><strong>
                                      <?=$row['price']?>
                                    </strong></span></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB05"><strong>
                                      <?=$row['total']?>
                                    </strong></span></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB12"><strong>
                                      <?=$row['statusname']?>
                                    </strong></span></td>
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash" ><span class="textJIB05"><strong>
                                    <? if ($row['statusid']=='1') { ?>
                                    <a class="a1" href="_booking.php?status=pay&bookingid=<?=$row['bookingid']?>">ชำระเงิน</a>
                                    <? } else { ?>
                                    <a class="a1" href="_booking.php?status=detail&bookingid=<?=$row['bookingid']?>">รายละเอียด</a>                                    
                                    <? } ?>                                    
                                    </strong></span></td>
                                  </tr>
                                  
                             <? $i++; 
							 } ?>
                          <tr>
                            <td height="28" colspan="9" bgcolor="#F9F9F9">&nbsp;</td>
                            </tr>
                             
						  <? if ($i==1) { ?>
                          <tr>
                            <td colspan="9" align="center" bgcolor="#FCFCFD" class="errbox">!!!!! ไม่พบรายการข้อมูล !!!!</td>
                            </tr>
                          <? } ?>
                          
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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
		echo "<meta http-equiv='refresh' content='0;URL=_booking.php'>";		
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
				echo "<meta http-equiv='refresh' content='0;URL=_booking.php'>";		
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
		echo "<meta http-equiv='refresh' content='0;URL=_booking.php'>";		
			
	}

?>

</body>
</html>
