<?
	session_start();
	include ("config.ini.php");	
	$strsql="SELECT tblmember.* FROM tblmember WHERE tblmember.username='".$_SESSION[username]."' ";
	$myrs=mysql_query($strsql);
	$data = mysql_fetch_assoc($myrs);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=headname?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">

<style type="text/css">
<!--
body {
	background-image: url(images/images.jpeg);
}

#apDiv1 {
	position:absolute;
	left:399px;
	top:401px;
	width:160px;
	height:119px;
	z-index:1;
}
.ui-datepicker{
	width:170px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}

-->
</style>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">

$(function(){
	var dateBefore=null;
	$("#begindate").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
		buttonImage: 'calendar.jpeg',
		buttonImageOnly: true,
		dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
		monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		changeMonth: true,
		changeYear: true ,
		beforeShow:function(){
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val());
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);

		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val());
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
		}

	});
	
});

$(function(){
	var dateBefore=null;
	$("#finishdate").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
		buttonImage: 'calendar.jpeg',
		buttonImageOnly: true,
		dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
		monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		changeMonth: true,
		changeYear: true ,
		beforeShow:function(){
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val());
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);

		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val());
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
		}

	});
	
});

function check_number() {
e_k=event.keyCode
//if (((e_k < 48) || (e_k > 57)) && e_k != 46 ) {
if (e_k != 13 && (e_k < 48) || (e_k > 57)) {
event.returnValue = false;
alert("ช่องข้อความนี้รับข้อมูลเป็นตัวเลขเท่านั้น... \n กรุณากรอกข้อมูลของคุณอีกครั้ง...");
}
} 

function calcfunc() {
     var val1 = parseFloat(document.formbook.amount.value);
     var val2 = parseFloat(document.formbook.price.value);
     var val3 = parseFloat(document.formbook.total.value);
     document.formbook.total.value=val1*val2;
}



function checktxt() {
	if(document.formbook.membername.value=="") {
		alert("โปรดระบุชื่อ-สกุลผู้เช่าด้วยค่ะ") ;
		document.formbook.membername.focus() ;
		return false ;
	}
	else if(document.formbook.telephone.value=="") {
		alert("โปรดระบุเบอร์โทรศัพท์ผู้เช่าด้วยค่ะ") ;
		document.formbook.telephone.focus() ;
		return false ;
	}
	else if(document.formbook.email.value=="") {
		alert("โปรดกรอกข้อมูลกรอกอีเมล์ด้วยนะค่ะ") ;
		document.formbook.email.focus();
		return false ;
	}
	else if(document.formbook.email.value.indexOf('@')==-1) {
		alert("อีเมล์ของคุณไม่ถูกต้องค่ะ") ;
		document.formbook.email.focus() ;
		return false ;
	}
		else if(document.formbook.email.value.indexOf('.')==-1) {
		alert("อีเมล์ของคุณไม่ถูกต้องค่ะ") ;
		document.formbook.email.focus() ;
		return false ;
	}
	else if(document.formbook.amount.value>0) {
		alert("โปรดระบุเจำนวนวันให้ถูกต้องด้วยค่ะ") ;
		document.formbook.amount.focus() ;
		return false ;
	}
	else 
		return true ;
	}
	
</script>


</head>

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
                          <td height="38" colspan="3" background="images/barlong.gif" class="txtwhitebold">&nbsp;&nbsp; BOOKING :&nbsp;<?=$item['yeehorname']." : ".$item['modelname']?></td>
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
                                <td valign="top" background="images/boxleft.gif">&nbsp;</td>
                                <td valign="top">
							<table width="100%" border="0" cellspacing="1" cellpadding="1">
                            
                                  <tr>
                                    <td width="25%" align="right" valign="middle" class="tbline_menu_dash"><span class="text01">ยี่ห้อรถจักรยานยนต์ :</span></td>
                                    <td align="left" valign="middle" class="tbline_menu_dash"><?=$item['yeehorname']?></td>
                                    </tr>
                                  <tr>
                                    <td width="25%" align="right" valign="middle" class="tbline_menu_dash"><span class="text01">รุ่นรถจักรยานยนต์ :</span></td>
                                    <td align="left" valign="middle" class="tbline_menu_dash"><?=$item['modelname']?></td>
                                    </tr>
                                  
                              <tr>
                                <td align="right">&nbsp;</td>
                                <td align="left">&nbsp;</td>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="21" valign="top"><img src="images/box01.gif" width="21" height="19" /></td>
                                <td width="598" valign="top" background="images/boxtop.gif">&nbsp;</td>
                                <td width="21" valign="top"><img src="images/box02.gif" width="23" height="19" /></td>
                              </tr>
                              <tr>
                                <td valign="top" background="images/boxleft.gif">&nbsp;</td>
                                <td valign="top">
                                
                                <form name ="formbook" action="savebooking.php" method="POST" onSubmit="return check()">
                                <input name="status" type="hidden" value="save" />                                        
                                <input name="modelid" type="hidden" value="<?=$_GET['id']?>" />                                        
                                <input name="memberid" type="hidden" value="<?=$data['memberid']?>" />                                        
                                <table width="100%" border="0" cellspacing="2" cellpadding="1">
                                <tr>
                                  <td height="28" colspan="2" align="left" class="topic_detail_">กรอกข้อมูลรายละเอียดผู้เช่า</td>
                                  </tr>
                                <tr>
                                  <td width="28%" align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ชื่อ / สกุล:</td>
                                  <td width="72%" align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="membername" type="text" class="inputtext" id="membername" value="<?=htmlspecialchars($data['membername'])?>" size="40"/>
                                  </label></td>
                                </tr>
                                
                                
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">มือถือ :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="telephone" type="text" class="inputtext" id="telephone" value="<?=htmlspecialchars($data['telephone'])?>" size="10"/>
                                  </label></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">อีเมลล์ :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><input name="email" type="text" class="inputtext" id="email" value="<?=htmlspecialchars($data['email'])?>" size="40" maxlength="255"/></td>
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
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="begindate" type="text" class="inputtext" id="begindate" size="10" maxlength="10"  value="<?=$_GET['action']=="edit" ? $item['begindate'] : date("d-m-Y")?>" />
                                  </label></td>
                                </tr>
                              <!-- <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ถึงวันที่ :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="finishdate" type="text" class="inputtext" id="finishdate" size="10" maxlength="10"  value="<?$_GET['action']=="edit" ? $item['finishdate'] : date("d-m-Y")?>" />
                                  </label></td>
                                </tr>-->
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">จำนวนวัน :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="amount" type="text" class="inputtext_number" id="amount" value="1" size="5" maxlength="5" onkeypress="check_number()" onKeyUp="calcfunc()" />
                                    วัน
                                  </label></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ค่าเช่าต่อวัน :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="price" type="text" class="inputtext_number" readonly="readonly" id="price" value="<?=htmlspecialchars($item['price'])?>" size="10" maxlength="10" onkeypress="check_number()"/>
                                  บาท</label></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FFFFFF" class="tbline_b_dash">ยอดเงิน :</td>
                                  <td align="left" bgcolor="#FFFFFF" class="tbline_b_dash"><label>
                                    <input name="total" type="text" class="inputtext_number" readonly="readonly" id="total" value="<?=($item['price'])?>" size="10" maxlength="10" onkeypress="check_number()"/>
                                  บาท</label></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="2" align="right" bgcolor="#FFFFFF" class="tbline_b_dash">
                                                                            <div align="center"> 
                                                          <input name="Submit" type="submit" value="บันทึกข้อมูลการจองรถ">
                                                          &nbsp;
                                                          <input name="Submit2" type="reset" value="ล้างข้อมูล">
                                                          <input name="ok" type="hidden" id="ok" value="ok_pass">
                                                        </div>                      </td>
                                  </tr>
                              </table>                                        
                              </form>         
                                
                                
                                </td>
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
