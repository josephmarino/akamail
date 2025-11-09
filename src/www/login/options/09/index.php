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
require($_SERVER['DOCUMENT_ROOT'] . '/include/webedit/WebEdit.inc');
require($_SERVER['DOCUMENT_ROOT'] . '/include/webedit/inc/default.inc');
$mail	= new Mail();
$ae	= new WebEdit();
session_start();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailPostIs('enable') ) {

	$mail->MailAutoRpdRegister($_POST['rpdsubject'],$_POST['rpdtext'],$_POST['rpdfolder'],$_POST['rpdsaveto'],mktime(0,0,0,$_POST['from']['month'],$_POST['from']['day'],$_POST['from']['year']),mktime(0,0,0,$_POST['to']['month'],$_POST['to']['day'],$_POST['to']['year']));
}

if( $mail->MailPostIs('disable') ) {

	$mail->MailAutoRpdRelease();
}

$mail->MailAutoRpdList();

if( $mail->mail_autorpd_list['status'] != 0 ) {

	$_SESSION['folder_cur'] = $mail->mail_autorpd_list['folder'];
	
	if( empty($_POST) ) {
	
		$_POST['rpdsubject']	= $mail->mail_autorpd_list['subject'];
		$_POST['rpdtext']	= $mail->mail_autorpd_list['text'];
		$_POST['rpdsaveto']	= $mail->mail_autorpd_list['saveto'];
	}
}
	
$editbox 		= '<textarea  name="rpdtext" cols=85 rows=10 class="textfields">' . $_POST['rpdtext'] . '</textarea>';	

switch(date('n')) {
                                    	
	case 2:
		$lastday 	= (date('L') == 1) ? 29 : 28;
                break;		
 	case 4:
 		$lastday 	= 30;
 		break;
 	case 5:
                $lastday 	= 30;
                break;
        case 9:
        	$lastday	= 30;
        	break;
        case 11:
        	$lastday 	= 30;
        	break;
        default:
        	$lastday 	= 31;
        	break;
}
                                         	
$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;

}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

function vacation() {
	h3ll0=window.open('/info/email/autoresponse/vacation.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function datehelp() {
	h3ll0=window.open('/info/email/autoresponse/schedule.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function accountlist() {
	h3ll0=window.open('/info/email/autoresponse/accountlist.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function enabledlist() {
	h3ll0=window.open('/info/email/autoresponse/enabledlist.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function calendar() {
	h3ll0=window.open('/info/email/autoresponse/calendar.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function from() {
	h3ll0=window.open('/info/email/autoresponse/from.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function to() {
	h3ll0=window.open('/info/email/autoresponse/to.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function interactivehelp() {

	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');

}

function submit_form() {
<? print($OnRich); ?>
document.email.submit();
}	

</script>
<style type="text/css">
@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</style>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('../../img/compose_eml_d.jpg','../../img/address_book_d.jpg','../../img/collect_email_d.jpg')" link="#0000cc" vlink="#0000cc" alink="#0000cc">

<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
      <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
        <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
          <tr align="left" valign="bottom"> 
            <td height="47" width="11" valign="middle"> 
              <div align="left"></div>
            </td>
            <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"> <? print($mail->mail_folder_view_top); ?></td>
          </tr>
        </table>
          <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
            <tr> 
              <td height="2"> <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
                  <tr> 
                    <td height="2"> <table width="800" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="365"><img src="/img/1_dv.gif" width="365" height="31"></td>
                          <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
                          <td width="76"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
                          <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
                          <td width="62"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
                          <td width="99"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="29">&nbsp;</td>
           <td width="761" align="left" valign="top"> 
              <table width="771" border="0" cellpadding="0" cellspacing="0" class="akalink">
                  <tr> 
                    <td width="475" height="1"><font face="Arial, Helvetica, sans-serif" size="2"><b><font size="3"><b><b><b><font class="body" color="#0f3f7f"> 
                      </font></b></b></b></font></b></font></td>
                    <td width="296">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td height="33" align="left" valign="middle"><font color="#FF0000"><b><? $mail->MailErrorPrint(); ?></b></font></td>
                    <td>&nbsp; </td>
                  </tr>
                </table>
                <table width="742" border="0" cellpadding="0" cellspacing="0">
                  <tr valign="bottom"> 
                    <td width="742" height="10"><font color="#000000"><strong><span class="headers">E-Mail 
                      Auto-Response System </span></strong></font></td>
                  </tr>
                  <tr align="left" valign="top"> 
                    <td height="100" colspan="2"><table width="332" border="0">
                        <tr> 
                          <td width="326" height="23" class="akalink">Auto answer all e-mail's 
                            during this time frame:</td>
                        </tr>
                        <tr> 
                          <td height="71" align="left" valign="top" class="akalink"> <table width="274" border="0" cellspacing="0" cellpadding="0">
                              <tr class="akalink"> 
                                <td width="37">From: </td>
                                <td width="237"> <select name="from[month]" class="dropdowns">        
                                    <?
                                    
                                    for($i=1; $i<=12; $i++) {
                                    	
                                    	if( $mail->mail_autorpd_list['status'] != 0 && date('n',$mail->mail_autorpd_list['rdate']) == $i ) {
                                    			
                                    		print('<option selected value="' . $i . '">' . date('M',mktime(0,0,0,$i,1,2000)) . '</option>');
                                    	
                                    	} elseif( $mail->mail_autorpd_list['status'] == 0 && date('n') == $i ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . date('M',mktime(0,0,0,$i,1,2000)) . '</option>');
                                    	
                                    	} else {
                                    		
                                    		print('<option value="' . $i . '">' . date('M',mktime(0,0,0,$i,1,2000)) . '</option>');
                                    	}
                                    }
                                    
                                    ?>
                                  </select> <select name="from[day]" class="dropdowns">
                                    
                                   <?
                         
                                    for($i=1; $i<=$lastday; $i++) {
                                    	
                                    	if( $mail->mail_autorpd_list['status'] != 0 && date('d',$mail->mail_autorpd_list['rdate']) == $i ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . $i . '</option>');
                                    
                                    	} elseif( $mail->mail_autorpd_list['status'] == 0 && date('d') == $i ) {
                                   
                                    		print('<option selected value="' . $i . '">' . $i . '</option>');
                                    	
                                    	} else {
                                    		
                                    		print('<option value="' . $i . '">' . $i . '</option>');
                                    	}
                                    }
                                    
                                    ?>
                                  </select> <select  name="from[year]" class="dropdowns">
                                    <?
                                    
                                    for($i=date('Y'); $i<=date('Y')+1; $i++) {
                                    	
                                    	if( $mail->mail_autorpd_list['status'] != 0 && date('Y',$mail->mail_autorpd_list['rdate']) == $i ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . $i . '</option>');
                                    	
                                    	} else {
                                    	
                                    		print('<option value="' . $i . '">' . $i . '</option>');
                                    	}
                                    }
                                    
                                    ?>
                                  </select>
                                </td>
                              </tr>
                            </table>
                            <table width="274" border="0" cellspacing="0" cellpadding="0">
                              <tr class="akalink"> 
                                <td width="37" height="29" valign="middle">To: 
                                </td>
                                <td width="237" height="29"> <select  name=to[month] class="dropdowns"> 
                                    <?
                                   
                                   $nextmonth = (date('n') + 1 == 13) ? 1 : date('n') + 1;
                                    
                                   if( date('Y',mktime(0,0,0,date('n'),date('d'),date('Y')) + 86400) == date('Y') + 1 ) {
                                   	
                                   	$selectyear = date('Y') + 1;
                                   
                                   } else {
                                   
                                   	$selectyear = date('Y');
                                   }  
                                  
                                    if( date('n',mktime(0,0,0,date('n'),date('d'),date('Y')) + 86400) == $nextmonth ) {
                                   	
                                   	$selectday 	= 1;
                                   	$selectmonth 	= $nextmonth;
                                   	
                                   } else {
                                   
                                   	$selectday 	= date('d') + 1;
                                   	$selectmonth 	= date('n');
                                   }
                                   
                                    for($i=1; $i<=12; $i++) {
                                    	
                                    	if( $mail->mail_autorpd_list['status'] != 0 && date('n',$mail->mail_autorpd_list['sdate']) == $i ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . date('M',mktime(0,0,0,$i,1,2000)) . '</option>');
                                    	
                                    	} elseif( $mail->mail_autorpd_list['status'] == 0 && $i == $selectmonth ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . date('M',mktime(0,0,0,$i,1,2000)) . '</option>');
                                    	
                                    	} else {
                                    		
                                    		print('<option value="' . $i . '">' . date('M',mktime(0,0,0,$i,1,2000)) . '</option>');
                                    	}
                                    }
                                    
                                    ?>
                                  </select> <select  name=to[day] class="dropdowns">
                                     <?
                                    
                                    for($i=1; $i<=$lastday; $i++) {
                                    	
                                    	if( $mail->mail_autorpd_list['status'] != 0 && date('d',$mail->mail_autorpd_list['sdate']) == $i ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . $i . '</option>');
                                    	
                                    	} elseif( $mail->mail_autorpd_list['status'] == 0 && $i == $selectday ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . $i . '</option>');
                                    	
                                    	} else {
                                    	
                                    		print('<option value="' . $i . '">' . $i . '</option>');
                                    	}                                   
                                    }
                                    
                                    ?>
                                  </select> <select  name=to[year] class="dropdowns">
                                   <?
                                    
                                    for($i=date('Y'); $i<=date('Y')+1; $i++) {
                                    	
                                    	if( $mail->mail_autorpd_list['status'] != 0 && date('Y',$mail->mail_autorpd_list['sdate']) == $i ) {
                                    	
                                    		print('<option selected value="' . $i . '">' . $i . '</option>');
                                    		
                                    	} else {
                                    	
                                    		print('<option value="' . $i . '">' . $i . '</option>');
                                    	} 
                                    }
                                    
                                   ?>
                                  </select>
                                </td>
                              </tr>
                            </table>
                            <table width="84%" border="0" cellpadding="0" cellspacing="0">
                              <tr> 
                                <td width="10%" height="18">&nbsp;</td>
                                <td width="90%" align="left" valign="middle"><? print($mail->mail_autorpd_list['statusimg']); ?></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="332" border="0">
                        <tr> 
                          <td width="326" height="17" valign="bottom" class="akalink"><strong><font color="#000000">Extra 
                            Options:</font></strong></td>
                        </tr>
                        <tr> 
                          <td height="25" align="left" valign="top" class="akalink"> 
 
                            <table width="306" border="0">
							  <tr class="akalink"> 
								<td width="306" align="left"> <input name="rpdsaveto" type="checkbox" value="1" <? if( $_POST['rpdsaveto'] == 1 ) print('checked'); ?>>
								  Save Answered E-mails to: <font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
								  <select  name="rpdfolder" class="dropdowns" id="select2">
									<? print($mail->mail_folder_view_move); ?> 
								  </select>
								  </font> <font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088">&nbsp; 
								  </font> </td>
							  </tr>
							  <tr class="akalink">
								<td align="left">&nbsp;</td>
							  </tr>
							</table>
                          </td>
                        </tr>
                      </table>
                  	  
					  <table width="530" height="30" border="0">
					  <tr> 
			                  <td width="45" height="26" align="right" valign="middle" class="akalink">Subject: 
				          </td>
				          <td width="473" align="left" valign="middle" class="akalink"><font color=#000000>
					  <input name="rpdsubject" class="textfields" size="60"  maxlength="64" value="<? print($_POST['rpdsubject']); ?>">
					  </font></td>
					  </tr>
					  </table>
					  <font face="Arial, helvetica, sans-serif" color="#666666" size="2"> 
					  <? print($editbox); ?>
					  </font></td>
                  </tr>
                </table>
                <table width="470" border="0">
                  <tr> 
                    <td width="464" height="39" valign="bottom">
                    
                    
                    <? if( $mail->mail_autorpd_list['status'] == 0 ) { ?>
                     
                    	<input type="image" border="0" name="enable" src="/img/ENABLE_BUTTONS.gif" width="100" height="30">
                    
                    <? } elseif( $mail->mail_autorpd_list['status'] != 0 ) { ?>
                    
                    	<input type="image" border="0" name="disable" src="/img/DISABLE_BUTTONS.gif" width="100" height="30">
                    
                    <? } ?>
                    
                    <a href="/login/options/"><img src="/img/btn_cancel_autores.gif" width="100" height="30" border="0"></a> 
                    </td>
                  </tr>
                </table>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table> </td>
          </tr>
        </table>
      </td>
    </tr>
    </tbody> 
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
</body>
</html>
