<?
	session_start();
	include ("config.ini.php");	
	$strsql="SELECT tblbooking.*,tblmember.*,tblbooking.statusid,tblstatus.statusname FROM tblbooking Inner Join tblmember ON tblbooking.memberid = tblmember.memberid Inner Join tblstatus ON tblbooking.statusid = tblstatus.statusid WHERE tblbooking.bookingid='".$bookingid."' ";
	$myrs=mysql_query($strsql);
	$data = mysql_fetch_assoc($myrs);
	if (!empty($status)) {
		//$strsql="SELECT tblmember.*,tbluser.upassword FROM tblmember Inner Join tbluser ON tblmember.username = tbluser.username WHERE tblmember.username='".$_SESSION[username]."' ";
		//$myrs=mysql_query($strsql);
		//$data1 = mysql_fetch_assoc($myrs);
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
</style>
<script type="text/javascript">


function checktext() {
	if(document.frm1.payee.value=="") {
		alert("กรุณาระบุชื่อด้วยค่ะ") ;
		document.frm1.payee.focus() ;
		return false ;
	}
	else if(document.frm1.amountmoney.value=="") {
		alert("กรุณาระบุจำนวนเงินด้วยค่ะ") ;
		document.frm1.amountmoney.focus() ;
		return false ;
	} else { 
		return true ;
	}
}

function key_onkeypress()
{//65 - 90 ͡
	if (event.keyCode <48 || event.keyCode > 57 ){
		alert('ไม่สามารถกรอกตัวอักษร กรุณากรอกตัวเลข 0-9');
		event.keyCode = 0
		return false
	} 
} 
	
</script>
<?
		if ($_POST['save']=='yes'){
			//if ($status=='new'){			
				$mstr = "INSERT INTO tblpayment(bookingid,bankid,paymentdate,total,payee) VALUES('".$_POST['bookingid']."','".$_POST['bankid']."','".$_POST['paymentdate']."','".$_POST['amountmoney']."','".$_POST['payee']."' )";
				mysql_query($mstr)   or die(mysql_error());
				$mstr = "UPDATE tblbooking SET statusid = 2 WHERE tblbooking.bookingid ='".$_POST['bookingid']."' ";
				mysql_query($mstr)  or die(mysql_error());
				echo"<script language=javascript>";
				echo"alert('บันทึกข้อมูลเรียบร้อยครับ')"; 
				echo"</script>";
				echo "<meta http-equiv='refresh' content='0;URL=_listrent.php'>";															
			//}else{
				//$mstr ="UPDATE tblpayment SET bankid='".$_POST['bankid']."',paymentdate='".$_POST['paymentdate']."',total='".$_POST['amountmoney']."',payee='".$_POST['payee']."' WHERE bookingid ='".$_POST['bookingid']."' ";
				mysql_query($mstr)  or die(mysql_error());
					echo"<script language=javascript>";
					echo"alert('บันทึกข้อมูลเรียบร้อยครับ')"; 
					echo"</script>";
					echo "<meta http-equiv='refresh' content='0;URL=_listrent.php?save=ok&bookingid=$_POST[bookingid]'>";															
			//}
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
                <td width="789" valign="top" class="tablecomment_l_r">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                      <td>
				<table width="100%" border="0" cellspacing="2" cellpadding="1">
                      
                      <tr>
                        <td height="42" background="images/bbar.gif" class="txtwhitebold">&nbsp;ประวัติการจองรถจักรยานยนต์</td>
                      </tr>
                      <tr>
                        <td>
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
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><?=($data['total'])?>&nbsp;บาท</td>
                                </tr>
                                
                              </table>                                    
                                    
                                    
                                    </td>
                                  </tr>
								  <? } elseif (($status=='pay')||($data['statusid'] =='3')){ ?>
                                  <tr>
                                    <td>
                                   <form action="" method="post" enctype="multipart/form-data" name="frm1" onsubmit="return checktext()">
                                   <input name="save" type="hidden" value="yes" />
                                    <input type="hidden" name="action" value="<?=$action;?>"/>
                                    <input type="hidden" name="bookingid" value="<?=$_GET['bookingid'];?>"/>
                                        
                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">                              
                <tr>
                                               <td height="26" colspan="2" align="left" bgcolor="#FFFEFB" class="tbline_b_dash">&nbsp;<span class="topic_detail_white">รายละเอียดการโอนเงิน</span></td>
                                      </tr>
                                      <tr>
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">ชื่อ-สกุลผู้โอน :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><label>
                                        <input name="payee" type="text" id="payee" class="inputtext" size="50" maxlength="50" value="<?=htmlspecialchars($data['membername'])?>" />
                                        </label></td>
                                      </tr>
                                      <tr >
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">ธนาคาร :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash">
                                        <select id="bankid" name="bankid" class="inputtext">
                                        <?
                                           $mysql = "SELECT bankid,bankname  FROM tblbank  ORDER BY bankid";
                                           $myrs = @mysql_query($mysql);
                                           while ($row = @mysql_fetch_assoc($myrs)){
                                        ?>
                                        <option value="<?=$row[bankid]?>"  <?=$item[bankid]==$row[bankid] ? "selected = selected" : "''";?> ><?=$row['bankid']." : ".$row[bankname]?></option>
                                        <?}?>
                                        </select>                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">วันที่โอน :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><input name="paymentdate" type="text" class="inputtext"  id="paymentdate" value="<?=$newdata=="no" ? $item['paymentdate'] : date("d-m-Y")?>" size="10" maxlength="10" /></td>
                                      </tr>
                                      <tr>
                                        <td align="right" bgcolor="#FFFEFB" class="tbline_b_dash">จำนวนเงิน :</td>
                                        <td align="left" bgcolor="#FFFEFB" class="tbline_b_dash"><input name="amountmoney" type="text" class="readonly_" id="amountmoney" size="10" maxlength="10" value="<?=htmlspecialchars($data['total'])?>"  onkeypress="key_onkeypress()"/>
                                          <span class="txt06">บาท</span></td>
                                      </tr>
                                      
                                              <tr>
                                                <td colspan="2" align="center" bgcolor="#FFFEFB" class="tb-line2"><label>
                                                  <input type="submit" name="button" id="button" value="บันทึกข้อมูล" />
                                                </label></td>
                                    </tr>
                                          </table>
                                          </form>
                                    
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
                      <tr>
                        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
                          <tr>
                            <td width="8%" height="28" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">BookID</span></td>
                            <td width="25%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">รุ่นรถ</span></td>
                            <td width="11%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">วันที่เช่า</span></td>
                            <td width="8%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">จำนวนวัน</span></td>
                            <td width="8%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">ราคา / วัน</span></td>
                            <td width="12%" align="center" bgcolor="#F9F9F9" class="tbline_b_dash" ><span class="textJIB14">คิดเป็นเงิน</span></td>
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
                                    <td align="center" bgcolor="#FCFCFD" class="tbline_b_dash"><a href="_listrent.php?status=detail&bookingid=<?=$row['bookingid']?>" class="a1"><strong>
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
                                    <a class="a1" href="_listrent.php?status=pay&bookingid=<?=$row['bookingid']?>">ชำระเงิน</a>
                                    <? } else { ?>
                                    <a class="a1" href="_listrent.php?status=detail&bookingid=<?=$row['bookingid']?>">รายละเอียด</a>                                    
                                    <? } ?>                                    
                                    </strong></span></td>
                                  </tr>
                                  
                             <? $i++; 
							 } ?>
                          <tr>
                            <td height="28" colspan="8" bgcolor="#F9F9F9">&nbsp;</td>
                            </tr>
                             
						  <? if ($i==1) { ?>
                          <tr>
                            <td colspan="8" align="center" bgcolor="#FCFCFD" class="errbox">!!!!! ไม่พบรายการข้อมูล !!!!</td>
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
                        </table></td>
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
