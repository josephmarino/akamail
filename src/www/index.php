<?
///
// +--------------------------------------------------------------------------------------------------------+
// | AKA Mail - Revision 1.0                                                                                |
// | Copyright (c) 2003 AKA Link Communications Corporation, Joseph P. Marino, Jonathan Fortin              |
// +--------------------------------------------------------------------------------------------------------+
// | Authors: Joseph P. Marino <joseph@marino.net> and Jonathan Fortin <jonathan@fortin.com>                |
// +--------------------------------------------------------------------------------------------------------+
// | AGPLv3 License                                                                                         |
// |                                                                                                        |
// | This file is part of AKA Mail.                                                                         |
// |                                                                                                        |
// | AKA Mail is free software: you can redistribute it and/or modify it under the terms of the             |
// | GNU Affero General Public License as published by the Free Software Foundation, either version 3       |
// | of the License, or (at your option) any later version.                                                 |
// |                                                                                                        |
// | AKA Mail is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even     |
// | the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                           |
// |                                                                                                        |
// | See the GNU Affero General Public License for more details.                                            |
// |                                                                                                        |
// | You should have received a copy of the GNU Affero General Public License along with AKA Mail.          |
// | If not, see <https://www.gnu.org/licenses/>.                                                           |
// +--------------------------------------------------------------------------------------------------------+
///

require($_SERVER['DOCUMENT_ROOT'] . '/include/akamail.class');
$mail = new Mail();
session_start();
	
	$mail->MailPageNoCache();
	
//	if( !isset($_SESSION['ssldflt']) ) {
//
//		$_SESSION['ssldflt'] = TRUE;
//		header('Location: https://' . $mail->server['main'] . $_SERVER['REQUEST_URI']);
//		exit();
//	} 
	
	if( substr($_SERVER['REQUEST_URI'],-1) == '?' ) {
	
		$showreset = ' onLoad="showlostpassword();"';
	} 
	
	if( $mail->MailPostIs('cancel') ) {
		
		header('Location: https://' . $mail->server['main']);
		exit();
	}
	
	if( $mail->MailPostIs('signin') || isset($_COOKIE['login']) ) {
		
		$mail->MailLoginSignIn($_POST['login'],$_POST['passwd'],$_POST['autolog'],$_COOKIE['login'],$_GET['action']);
	}
	
	if( $mail->MailPostIs('restoreprepare') ) {

		if( $mail->MailLoginRestoreIs($_POST['rlogin'],$_POST['maiden'],$_POST['bdyear'] . '-' . $_POST['bdmonth'] . '-' . $_POST['bdday']) ) {

			$showreset 			= ' onLoad="showreset();"';
	
		} else {
		
			$showreset 			= ' onLoad="showlostpassword();"';
			$mail->error_restore_prepare	= $mail->error['result'];
		}
	}

	if( $mail->MailPostIs('restore')  ) {
	
		if( !$mail->MailLoginRestore($_SESSION['login']['login'],$_POST['rpasswd'],$_POST['crpasswd']) ) {
	
			$showreset		= ' onLoad="showreset();"';
			$mail->error_restore	= $mail->error['result'];
		}
	}	
?>
<html>
<head>
<title>AKAMail - Web based E-Mail Service</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="SHORTCUT ICON" href="/favicon.ico">
</head>

<STYLE type=text/css>
@import url(/css/aka.css);

A:hover {
	COLOR: #666666
}
</STYLE>
<script language="JavaScript">

function Layr(name) {
	if (document.getElementById) {
		return document.getElementById(name);
	}
	if (document.all) {
		return document.all[name];
	}
	if (document.layers) {
		if (document.layers[name]) {
			return document.layers[name];
		}
	}
}

function showLayer (name) {
	layerShow = new Layr(name);
	layerShow.style.visibility = '';
	layerShow.style.display = '';
}

function hideLayer (name) {
	layerHide = new Layr(name);
	layerHide.style.visibility = 'hidden';
	layerHide.style.display = 'none';
}

function showLogin() {
  hideLayer('lostpwchallenge');
  showLayer('akamaillogin');
}

function securelostpassword() {

	secure('?');
}	
	
function showlostpassword() {
  hideLayer('akamaillogin');
  showLayer('lostpwchallenge');
}

function showreset() {
  hideLayer('akamaillogin');
  hideLayer('lostpwchallenge');
  showLayer('resetpasswd');
}

function security() {
	h3ll0=window.open('/info/mail/f_security.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function virus() {
	h3ll0=window.open('/info/mail/f_virus.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function wireless() {
	h3ll0=window.open('/info/mail/f_wireless.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function faq() {
	h3ll0=window.open('/info/mail/f_faq.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=640,height=500');
}

function filter() {
	h3ll0=window.open('/info/mail/f_filter.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function secure(ext) {
	window.location="http://<? print($mail->server['main']); ?>" + ext;
}	

function standard() {
	window.location="http://<? print($mail->server['main']); ?>";
}

</script>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" <? print($showreset); ?>>
<table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
  <tbody> 
  <tr align=left valign="top"> 
    <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
      <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
        <tr align="left" valign="bottom"> 
          <td height="47" width="11" valign="middle"> 
            <div align="left"></div>
          </td>
          <td height="47" width="789" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
        </tr>
      </table>
      <table width="800" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="80ADC1"> 
          <td height="2">&nbsp;</td>
        </tr>
      </table>
      <table width="800" border="0" height="342">
        <tr> 
          <td width="439" align="left" valign="top" rowspan="2"> 
            <table width="410" border="0" height="338">
              <tr align="left" valign="bottom"> 
                <td height="407"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" width="458" height="410">
                    <param name=movie value="flash/left.swf">
                    <param name=quality value=high>
                    <param name=menu VALUE=false>
                    <embed src="flash/left.swf" quality=high pluginspage="https://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="458" height="410">
                    </embed> 
                  </object> </td>
              </tr>
            </table>
          </td>
          <td width="10" background="img/l1n333ee.gif" rowspan="2">&nbsp;</td>
          <td width="346" align="left" valign="middle" height="168">
            <table width="309" border="0" align="center">
                <tr> 
                  <td height="112" width="33">&nbsp;</td>
                  <td height="112" width="266" align="left" valign="bottom"> <form method="post" action="<? $PHP_SELF ?>" name="login">
                      <div id="akamaillogin" style="visibility: visible; display:"> 
                        <table width="241" border="0" cellspacing="0">
                          <tr> 
                            <td width="239" rowspan="3" align="left" valign="top"> 
                              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td height="23" align="left" valign="top" class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
                                </tr>
                                <tr> 
                                  <td><table cellspacing=0 cellpadding=0 border=0>
                                      <tbody>
                                        <tr> 
                                          <td class=text8 width="120"><span class="akalink">E-Mail 
                                            Address: </span><font face="Arial, helvetica, sans-serif" color="#666666" size="2"> 
                                            <input class=sm style="BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #FFFFFF" maxlength="64" size="20" name="login">
                                            </font></td>
                                          <td class=text8 width="113">&nbsp;</td>
                                        </tr>
                                        <tr> 
                                          <td colspan="2"><img height=1 
            src="img/pixel.gif" width=1 
            border=0></td>
                                        </tr>
                                        <tr> 
                                          <td class=text8 width="120" height="19"><span class="akalink">Password: 
                                            </span><font face="Arial, helvetica, sans-serif" color="#666666" size="2"> 
                                            <input class=sm style="BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #FFFFFF" maxlength="64" size="20" name="passwd" type="password">
                                            </font></td>
                                          <td class=text8 width="113" height="19" valign="top" align="left"> 
                                            <table width="66" border="0" cellspacing="0" cellpadding="0">
                                              <tr valign="bottom" align="left"> 
                                                <td width="66" height="2">&nbsp; </td>
                                              </tr>
                                              <tr valign="middle" align="left"> 
                                                <td height="40"> <font color="#FFFFFF">- 
                                                  <input type="image" border="0" name="signin" src="img/login_bt.gif" width="43" height="19" onMouseOver="window.status='Login to AKAMail'; return true;" onMouseOut="window.status=''; return true;">
                                                  </font> </td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr align="left" valign="top"> 
                                          <td height="3" colspan="2" class="akalink"><a href="javascript:securelostpassword();">Forgot 
											Your Password?</a> </td>
                                        </tr>
                                        <tr> 
                                          <td height="27" colspan="2" align="left" valign="bottom" class="akalink"> 
                                            <input name="autolog" type="checkbox" id="autolog" value="1">
                                            Log me in automatically next time.</td>
                                        </tr>
                                      </tbody>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="174" border=0 cellpadding=0 cellspacing=0>
                                <tbody>
                                  <tr align="left" valign="top"> 
                                    <td width="158" colspan="2" class="akalink">&nbsp;</td>
                                  </tr>
                                  <tr align="left" valign="top"> 
                                    <td colspan="2" class="akalink"><font color="#FFFFFF">-</font>Login 
                                      Mode:<font color="#000000">&nbsp; </font></td>
                                  </tr>
                                  <tr align="left" valign="top"> 
                                    <td colspan="2" class="akalink"><font color="#000000"> 
                                      <input name="logmode" type="radio" value="0" <? if( !isset($_SERVER['HTTPS']) ) print('checked'); ?> onClick = standard();>
                                      </font>Standard<font color="#000000"> 
                                      <input type="radio" name="logmode" value="1" <? if( isset($_SERVER['HTTPS']) ) print('checked'); ?> onClick = secure('');>
									  </font>Secure<font color="#000000"> <a href="javascript:security();"><img src="/img/lock_domain.gif" width="11" height="15" border="0" onMouseOver="window.status='About the AKAMail Security System.'; return true;" onMouseOut="window.status=''; return true;"></a></font></td>
                                  </tr>
                                </tbody>
                              </table></td>
                          </tr>
                          <tr> </tr>
                          <tr> </tr>
                        </table>
                      </div>
                      <div id="lostpwchallenge" style="visibility: hidden; display: none"> 
                        <table width="241" border="0" cellspacing="0">
                          <tr> 
                            <td width="239" height="6" align="left" valign="top"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                          </tr>
                          <tr>
                            <td height="7" align="left" valign="top"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Recover 
                              Your Lost Password</strong></font></td>
                          </tr>
                          <tr> 
                            <td height="14" align="left" valign="top" class="akalink"><strong><font color="#FF0000"><? print($mail->error_restore_prepare); ?>  
                             </font></strong></td>
                          </tr>
                          <tr> 
                            <td width="239" height="53" align="left" valign="top" class="akalink">Before 
                              we can recover your password you must verify the 
                              following information on your account.</td>
                          </tr>
                          <tr> 
                            <td width="239" align="left" valign="top">
                            <table width="152" border=0 cellpadding=0 cellspacing=0>
                              <tbody> 
                              <tr> </tr>
                              <tr> 
                                <td height="20" valign="middle" class=text8><span class="akalink">E-Mail 
                                  Address: </span><font face="Arial, helvetica, sans-serif" color="#666666" size="2">&nbsp;</font><font face="Arial, helvetica, sans-serif" color="#666666" size="2">&nbsp; 
                                  </font></td>
                              </tr>
                              <tr>
                                <td height="14" valign="bottom" class=text8><font face="Arial, helvetica, sans-serif" color="#666666" size="2">
                                  <input class=sm style="BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #FFFFFF" maxlength="64" size="20" name="rlogin">
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="4" colspan="2"><img height=1 
            src="img/pixel.gif" width=1 
            border=0></td>
                              </tr>
                              </tbody> 
                            </table>
                              
                            <table cellspacing=0 cellpadding=0 border=0 width="140">
                              <tbody> 
                              <tr> </tr>
                              <tr> 
                                    
                                <td height="20" valign="middle" class=text8 width="196"><span class="akalink">Mother's 
                                  Maiden Name: </span></td>
                              </tr>
                              <tr>
                                <td height="14" valign="bottom" class=text8 width="196"><font face="Arial, helvetica, sans-serif" color="#666666" size="2">
                                  <input name="maiden" type="password" class=sm style="BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #FFFFFF" size="20" maxlength="20">
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="4" colspan="2"><img height=1 
            src="img/pixel.gif" width=1 
            border=0></td>
                              </tr>
                              </tbody> 
                            </table>
                              
                            <table height="44" border=0 cellpadding=0 cellspacing=0>
                              <tbody> 
                              <tr> 
                                    <td height="20" valign="middle" class=text8><span class="akalink">Birth 
									  Date:</span></td>
                              </tr>
                              <tr>
                                <td height="13" valign="bottom" class=text8><font face="Arial, helvetica, sans-serif" color="#666666" size="2">
                                  <select name="bdmonth" class="dropdowns" id="month">
                                    <option value="01">Jan (01)</option>
                                    <option value="02">Feb (02)</option>
                                    <option value="03">Mar (03)</option>
                                    <option value="04">Apr (04)</option>
                                    <option value="05">May (05)</option>
                                    <option value="06">Jun (06)</option>
                                    <option value="07">Jul (07)</option>
                                    <option value="08">Aug (08)</option>
                                    <option value="09">Sep (09)</option>
                                    <option value="10">Oct (10)</option>
                                    <option value="11">Nov (11)</option>
                                    <option value="12">Dec (12)</option>
                                  </select>
                                  <select name="bdday" class="dropdowns" id="day">
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                  </select>
                                  <select name="bdyear" class="dropdowns" id="year">
                                    <? for($year=date('Y'); $year>=1900; $year--) { 
                                        	
                   				print('<option value="' . $year . '">' . $year . '</option>');
                  			}
                		    ?>
                                  </select>
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="2" colspan="2"><img height=1 
            src="img/pixel.gif" width=1 
            border=0></td>
                              </tr>
                              </tbody> 
                            </table>
                              <table width="95%" height="45" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td height="43" valign="bottom"><input name="restoreprepare" type="image" id="submitinfo" src="/img/web_submit_lp.gif" width="95" height="30" border="0" onMouseOver="window.status='Submit your verification credentials.'; return true;" onMouseOut="window.status=''; return true;">
                                    <input name="cancel" type="image" id="cancellostpw" src="/img/web_cancel.gif" width="100" height="30" border="0"> 
                                  </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </div>
                      <div id="resetpasswd" style="visibility: hidden; display: none"> 
                        <table width="241" border="0" cellspacing="0">
                          <tr> 
                            <td width="239" height="6" align="left" valign="top"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                          </tr>
                          <tr>
                            <td height="7" align="left" valign="top"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Choose 
                              A New Password</strong></font></td>
                          </tr>
                          <tr> 
                            <td height="14" align="left" valign="top" class="akalink"><strong><font color="#FF0000"> 
                              <? print($mail->error_restore); ?> </font></strong></td>
                          </tr>
                          <tr> 
                            <td width="239" height="35" align="left" valign="top" class="akalink"> 
                              Please choose a new password for your 
                              e-mail account.</td>
                          </tr>
                          <tr> 
                            <td width="239" align="left" valign="top">
                            <table cellspacing=0 cellpadding=0 border=0 width="140">
                              <tbody> 
                              <tr> </tr>
                              <tr> 
                                <td height="20" valign="middle" class=text8 width="196"><span class="akalink">New 
                                  Password:</span></td>
                              </tr>
                              <tr> 
                                <td height="14" valign="bottom" class=text8 width="196"><font face="Arial, helvetica, sans-serif" color="#666666" size="2"> 
                                  <input name="rpasswd" type="password" class=sm style="BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #FFFFFF" size="20" maxlength="16">
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="4" colspan="2"><img height=1 
            src="img/pixel.gif" width=1 
            border=0></td>
                              </tr>
                              </tbody> 
                            </table>
                            <table cellspacing=0 cellpadding=0 border=0 width="140">
                              <tbody> 
                              <tr> </tr>
                              <tr> 
                                <td height="20" valign="middle" class=text8 width="196"><span class="akalink">Confirm 
                                  New Password:</span></td>
                              </tr>
                              <tr> 
                                <td height="14" valign="bottom" class=text8 width="196"><font face="Arial, helvetica, sans-serif" color="#666666" size="2"> 
                                  <input name="crpasswd" type="password" class="sm" style="BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #FFFFFF" size="20" maxlength="16">
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="4" colspan="2"><img height=1 
            src="img/pixel.gif" width=1 
            border=0></td>
                              </tr>
                              </tbody> 
                            </table>
                            <table width="95%" height="37" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td height="37" valign="bottom"> <input type="image" border="0" name="restore" src="/img/btn_setnewpassword.gif" width="178" height="28"> 
                                  </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </div>
                    </form></td>
                </tr>
              </table>
          </td>
        </tr>
        <tr>
          <td width="346" align="left" valign="top">
            <table width="312" border="0">
              <tr> 
                <td width="25">&nbsp;</td>
                <td width="275" valign="bottom"><img src="img/key_features_n.jpg" width="79" height="9"></td>
              </tr>
            </table>  <table width="313" border="0" height="51">
                <tr class="akalink"> 
                  <td width="25" height="0">&nbsp;</td>
                  <td width="260" height="0" valign="middle"><a href="javascript:wireless()" onMouseOver="window.status='Access Anywhere Anytime.'; return true;" onMouseOut="window.status=''; return true;">Wireless 
                    E-Mail Access</a></td>
                </tr>
                <tr class="akalink">
                  <td width="25" height="-1">&nbsp;</td>
                  <td height="-1" valign="middle"><a href="javascript:security();">128-Bit Encrypted Secure Access</a> </td>
                </tr>
                <tr class="akalink">
                  <td width="25" height="-1">&nbsp;</td>
                  <td height="-1" valign="middle"><a href="javascript:virus()">McAfee&copy; Anti-Virus Protection</a></td>
                </tr>
              </table>
            <table width="312" border="0">
              <tr> 
                <td width="25">&nbsp;</td>
                <td width="275" valign="bottom"><img src="img/information_n.jpg" width="68" height="9"></td>
              </tr>
            </table>  <table width="313" border="0" height="51">
                <tr class="akalink"> 
                  <td width="25" height="2">&nbsp;</td>
                  <td width="260" height="2" valign="bottom"><a href="javascript:faq()" onMouseOver="window.status='AKAMail most Frequently Asked Questions.'; return true;" onMouseOut="window.status=''; return true;">Frequently 
                    Asked Questions</a></td>
                </tr>
                <tr class="akalink"> 
                  <td width="25" height="2">&nbsp;</td>
                  <td width="260" height="2" valign="middle"><a href="javascript:security()" onMouseOver="window.status='About the AKAMail Security System.'; return true;" onMouseOut="window.status=''; return true;">How 
                    Secure Is My Information?</a> </td>
                </tr>
                <tr class="akalink"> 
                  <td width="25" height="2">&nbsp;</td>
                  <td width="260" height="2">&nbsp;</td>
                </tr>
              </table>
            <table width="314" border="0" height="32">
              <tr valign="bottom"> 
                  <td width="159" height="55" valign="middle"> <div align="center"><a href="javascript:virus();"><img src="/img/mcafee_logo.jpg" width="120" height="30" border="0" onMouseOver="window.status='About the advanced AKAMail virus protection system.'; return true;" onMouseOut="window.status=''; return true;"></a></div></td>
                  <td width="145" height="55" valign="middle"> <div align="left"></div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  </tbody> 
</table>
<? include($mail->tpl['html'] . '/footer.html'); ?>
</body>
</html>
