<table width="100%" border="0" cellpadding="1" cellspacing="2" class="tbline_menu_dash">
                  <tr>
                    <td valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3"><img src="images/member.gif" width="196" height="53" /></td>
                  </tr>
                  <tr>
                    <td width="12" height="113" background="images/l_login.gif"></td>
                    <td width="176" valign="top" bgcolor="#F9F9F9">
					<table width="100%" border="0" cellpadding="1" cellspacing="2" class="tablecomment">
                    <? if (empty($_SESSION[username])) { ?>
                          <tr>
                            <td>
                            <form id="frmlogin" name="frmlogin" method="POST" action="" onsubmit="return checktxt()">
                            <input name="login" type="hidden" value="yes" />
                              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                                <tr>
                                  <td align="left" bgcolor="#FCFCFC">รหัสผู้ใช้ </td>
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
                                  <td height="27" colspan="2" align="center" bgcolor="#F9FAFA"><a class="a1" href="register.php">สมัครสมาชิก</a></td>
                                  </tr>
                              </table>
                              </form>                            
                              </td>
                          </tr>
                     <? } else { ?>
                          <tr>
                            <td>
                              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                                <tr>
                                  <td colspan="2" align="left" bgcolor="#FCFCFC" class="topicdetailb">ยินดีต้อนรับ สมาชิก</td>
                                  </tr>
                                <tr>
                                  <td width="16%" align="left" bgcolor="#FCFCFC"></td>
                                  <td width="84%" align="left" bgcolor="#FCFCFC"></td>
                                </tr>
                                <tr>
                                  <td colspan="2" align="center" bgcolor="#FCFCFC"><?=$_SESSION[username]?></td>
                                  </tr>
                                <tr>
                                  <td align="right" bgcolor="#FCFCFC"><img src="images/bot1.gif" width="11" height="14" /></td>
                                  <td align="left" bgcolor="#FCFCFC"><a class="a1" href="_profile.php">แก้ไขข้อมูลส่วนตัว</a></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FCFCFC"><img src="images/bot1.gif" width="11" height="14" /></td>
                                  <td align="left" bgcolor="#FCFCFC"><a class="a1" href="_listrent.php">ประวัติการเช่ารถ</a></td>
                                </tr>
                                <tr>
                                  <td align="right" bgcolor="#FCFCFC"><img src="images/bot1.gif" width="11" height="14" /></td>
                                  <td align="left" bgcolor="#FCFCFC"><a class="a1" href="index.php?logoff=true">ออกจากระบบ</a></td>
                                </tr>
                                <tr>
                                  <td align="left" bgcolor="#FCFCFC"></td>
                                  <td align="left" bgcolor="#FCFCFC"></td>
                                </tr>
                                <tr>
                                  <td colspan="3" align="center" bgcolor="#FCFCFC"></td>
                                  </tr>
                              </table>
                              </td>
                          </tr>
                       <? } ?>
                        </table>                    
                        </td>
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
                </table>