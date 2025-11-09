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

require($_SERVER['DOCUMENT_ROOT']  . '/include/akamail.class');
require($_SERVER['DOCUMENT_ROOT']  . '/include/phpmailer.class');
require($_SERVER['DOCUMENT_ROOT']  . '/include/mimeDecode.php');
require($_SERVER['DOCUMENT_ROOT']  . '/include/webedit/WebEdit.inc');
require($_SERVER['DOCUMENT_ROOT']  . '/include/webedit/inc/default.inc');
session_start();
$mail	= new Mail();
$ae	= new WebEdit;

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();
$mail->MailLimitList();
$mail->MailContactList();
$mail->MailAccountList();
set_time_limit($mail->limit['page_wait_sec']);

if( $mail->mail_option_list['sslout'] == 1 ) {

	$sslout = 1;
		
	if( !isset($_SERVER['HTTPS']) ) {
	
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit();
	}
}	

if( isset($_SESSION['referer']) ) {

	$_SERVER['HTTP_REFERER'] = $_SESSION['referer'];
	unset($_SESSION['referer']);
}

if( !strstr($_SERVER['HTTP_REFERER'],'/login/compose') && !strstr($_SERVER['HTTP_REFERER'],'/login/view') ) {

	unset($_SESSION['compose']);
	unset($_SESSION['attach']);
}

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( !empty($_POST) ) {

	$_POST['compose']['to']		= $_POST['to'];
	$_POST['compose']['cc'] 	= $_POST['cc'];
	$_POST['compose']['bcc'] 	= $_POST['bcc'];
	$_POST['compose']['signature'] 	= $_POST['sign'];
	
	if( isset($_POST['msg']) ) {
	
		$_POST['compose']['msg']	= $_POST['msg'];
	}
	
	if( isset($_POST['compose']['from']) ) {
		
		if( $mail->MailAccountIs($_POST['compose']['from']) ) {
			
			$mail->MailAccountNameList($_POST['compose']['from']);
		}
	}
}

if( $mail->MailPostIs('fromdefaultset') ) {

	if( $mail->MailAccountDefaultRegister($_POST['compose']['from']) ) {
		
		if( $mail->mail_option_list['sslout'] == 0 ) {
		
			header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		
		} else {
		
			header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		}
			
		exit();
	}	
}

if( $mail->MailSignatureDefaultGet() ) {
	
	if( $mail->MailSignatureView($mail->mail_signature_default) ) {
		
		$signature 			= nl2br($mail->mail_signature_view['text']);
		include($mail->tpl['php'] . '/compose_signature.tpl');
		$mail->mail_signature_insert	= $template;
	}
}

if( $mail->MailPostIs('removefile') ) {
	
	$mail->MailComposeFileDetach($_POST['removefile']);
}

if( $mail->MailPostIs('removeall') ) {
	
	$mail->MailComposeFileDetach($_SESSION['attach']['file']);
}

if( $mail->MailPostIs('send') ) {

	if( $mail->MailComposeFormat($_POST['compose']) ) {
			
		$mail->MailComposeSend($_POST['compose']);
	}
}

if( $mail->MailPostIs('save') ) {

	if( $mail->MailComposeFormat($_POST['compose']) ) {
	
		$mail->MailComposeSave($_POST['compose']);
	}
}

if( $mail->MailPostIs('attach') ) {
	
	$_SESSION['compose']['compose'] = $_POST['compose'];
}

if( isset($_GET['action']) ) {

	if( empty($_POST) && $mail->mail_option_list['replyinclude'] == 1 ) {
	
		$_POST['compose']['include'] = 1;
	}
	
	$mail->MailMsgViewInclude($_GET['mid'],$_GET['action']);	
	
	if( $_POST['compose']['include'] == 1 ) {
		
		$_POST['compose']['msg']	= $mail->mail_msg_view_msg['mmsg'];
	
	} else {

		$_POST['compose']['msg']	= '';
	}
	
	if( isset($_GET['to']) ) {
		
		$_POST['compose']['to'] 	= $_GET['to'];
	}
		
	$_POST['compose']['priority']		= 3;
}


if( empty($_POST) ) {

	if( isset($_SESSION['compose']['compose']) ) {

		$_POST['compose'] = $_SESSION['compose']['compose'];
	
	} else {
		
		if( isset($_GET['togroup']) ) {
			
			$mail->MailComposeGroupList($_GET['togroup']);
			$_POST['compose']['to'] = $mail->mail_compose_group_list;
		}
			
		if( isset($_GET['to']) ) {
		
			$_POST['compose']['to'] = $_GET['to'];
		}
		
		if( isset($_GET['cc']) ) {
		
			$_POST['compose']['cc'] = $_GET['cc'];
		}
			
		if( isset($_GET['bcc']) ) {
		
			$_POST['compose']['bcc'] = $_GET['bcc'];
		}
		
		$_POST['compose']['editmode'] = $mail->mail_option_list['sendformat'];	
		$_POST['compose']['priority'] = 3;
	}
}

if( $_POST['compose']['editmode'] == 1 && !$ae->isnotIEMS() ) {
	
	$selectedit[1] 				= 'selected';
	$OnRich 				= 'aka_onSubmit();';
	list($user,$domain) 			= explode('@', $mail->lp['login']);
	
        $ae->attributes['alloweditsource'] 	= 'no';
        $ae->attributes['applet'] 		= 'auto';
        $ae->attributes['appletlicense'] 	= $mail->server['appletlicense'];
        $ae->attributes['defaultfont']		= '10pt Arial';
        $ae->attributes['height'] 		= 200;
        $ae->attributes['image'] 		= 'yes';
        $ae->attributes['imagepath'] 		= $mail->path['data']. '/' . $domain . '/' . $user[0] . '/' . $user[0] . $user[1] . '/' . $user . '/upload/';
       
       	if( $sslout == 1 ) {
        
        	$ae->attributes['imageurl'] 	= 'https://' . $mail->server['main'] . '/data/' . $domain . '/' . $user[0] . '/' . $user[0] . $user[1] . '/' . $user . '/upload';
        
        } else {
        	
        	$ae->attributes['imageurl']	 = 'http://' . $mail->server['main'] . '/data/' . $domain . '/' . $user[0] . '/' . $user[0] . $user[1] . '/' . $user . '/upload';
        }
        
        if( $sslout == 1 ) {
        
        	$ae->attributes['inc'] 		= 'https://' . $mail->server['main'] . '/include/webedit/inc';
        
        } else {
        
        	$ae->attributes['inc'] 		= 'http://' . $mail->server['main'] . '/include/webedit/inc';
        }
        
        $ae->attributes['name'] 		= 'msg';
        $ae->attributes['quickfontcolors']	= 'Black,Red,Green,Blue';
        $ae->attributes['quickfonts'] 		= 'Arial,Arial Black,Comic Sans MS,Courier New,Impact,Garamond,Times New Roman,Verdana,Webdings,Wingdings';
        $ae->attributes['quickstyles'] 		= 'highlight';
        $ae->attributes['quickstylesname'] 	= 'Highlight';
        $ae->attributes['stylesheet'] 		= '/style.css';
        $ae->attributes['tabview'] 		= 'true';
        $ae->attributes['toolbar'] 		= 'quickformat,quickfont,quickfontsize,|,spell,|,image,background,smiley,|,font,bold,italic,underline,hr,|,justifyleft,justifycenter,justifyright,|,bullets,numbers';
        $ae->attributes['upload'] 		= 'yes';
        $ae->attributes['width'] 		= 720;
        
        if( !empty($_POST['compose']['msg']) ) {
        	
        	  $ae->attributes['content'] 	= $_POST['compose']['msg'];
        }
	        
        $editbox = $ae->printAE();
      
} else {

	$_POST['compose']['editmode'] 		= 0;
	$selectedit[0]				= 'selected';
	$editbox 				= '<textarea name="compose[msg]" cols="850" rows="10" id="message" class="akamail-compose">' . $_POST['compose']['msg'] . '</textarea>';
}			

$mail->MailComposeFileList();
$mail->MailBookExpressList();
$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">

function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
}

function centerminibook(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=yes"; 
	theWin=window.open(url,'',features); }
	
	function centerwindow(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no"; 
	theWin=window.open(url,'',features); }  
	
	
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

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

function aeapi_custom_smiley(aeNum) {

	insert_smiley();
}

function submit_form() {
<? print($OnRich); ?>
document.email.submit();
}	
</script>
 
<STYLE type=text/css>
@import url("/css/aka.css");
A:hover {

	COLOR: #666666

}
</STYLE>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="if (document.email.sign.checked) { showLayer('signature'); } else { hideLayer('signature'); } ;">
<form action="" method="post" enctype="multipart/form-data" name="email">
<input type=hidden name="newfolder" value="">
	<table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"><table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
            <tr align="left" valign="bottom"> 
              <td height="47" width="11" valign="middle"> <div align="left"></div></td>
              <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"> <? print($mail->mail_folder_view_top); ?></td>
            </tr>
          </table>
          <table width="800" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td width="365"><img src="/img/1_dv.gif" width="365" height="31"></td>
              <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
              <td width="76"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
              <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
              <td width="62"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
              <td width="99"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
            </tr>
          </table>
          <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td width="5%" height="430">&nbsp;</td>
              <td width="95%" align="left" valign="top"><table width="770" height="38" border="0" cellpadding="0" cellspacing="0">
				  <tr> 
					<td width="509" class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
					<td width="261" class="akalink"><? $mail->MailSecurePrint(); ?></td>
				  </tr>
				</table>
                <table width="770" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td width="66%" height="168" rowspan="2" align="left" valign="top"><table width=97% cellspacing=0 cellpadding=2>
                        <tr> 
                          <td width="10%" align=left nowrap class="akalink"><a href="http://<? print($mail->server['main']); ?>/login/othermail/" onMouseOver="window.status='View your e-mail accounts'; return true;" onMouseOut="window.status=''; return true;">From:</a></td>
                          <td width=90% align="left" valign="top"><select name="compose[from]" class="dropdowns" id="select3" style=width:34em;>
                              <? print($mail->mail_account_select_list); ?> </select>
                            <input name="fromdefaultset" type="image" id="setdefault" onClick="return confirm('Should I make this e-mail account your default e-mail account?');" src="/img/btn_akamaildefault.jpg" width="21" height="18" border="0"></td>
                        </tr>
                        <tr> 
                          <td align=left nowrap class="akalink"><a href="javascript:centerminibook('/login/options/10/minibook/',485,300)" onMouseOver="window.status='Quickly add people from your address book to your e-mail'; return true;" onMouseOut="window.status=''; return true;">To:</a></td>
                          <td width=90% align="left" valign="top"><input name="to" type="text" class="textfields" id="to3" style="width:377px;" tabindex="1" title="To" value="<? print($_POST['compose']['to']); ?>" size="30" maxlength="1000" onFocus="focusnow('to')"> 
                            <? ($mail->mail_compose_img_error['to'] == TRUE) ? print('<img src="/img/xmark.gif">') : NULL; ?>
                          </td>
                        </tr>
                        <tr> 
                          <td align=left nowrap class="akalink"><a href="javascript:centerminibook('/login/options/10/minibook/',485,300)" onMouseOver="window.status='Quickly add people from your address book to your e-mail'; return true;" onMouseOut="window.status=''; return true;">Cc:</a></td>
                          <td align="left" valign="top"> <input name="cc"  type="text" class="textfields" id="cc3" style="width:377px;"  tabindex="2" title="cc" onFocus="focusnow('cc')" value="<?  print($_POST['compose']['cc']); ?>" size="30" maxlength="1000"> 
                            <? ($mail->mail_compose_img_error['cc'] == TRUE) ? print('<img src="/img/xmark.gif">') : NULL; ?>
                          </td>
                        </tr>
                        <tr> 
                          <td align=left nowrap class="akalink"> <a href="javascript:centerminibook('/login/options/10/minibook/',485,300)" onMouseOver="window.status='Quickly add people from your address book to your e-mail'; return true;" onMouseOut="window.status=''; return true;">Bcc:</a></td>
                          <td align="left" valign="top"> <input name="bcc" type="text" class="textfields" id="bcc3" style="width:377px;" tabindex="3" title="bcc" onFocus="focusnow('bcc')"  value="<? print($_POST['compose']['bcc']); ?>" size="30" maxlength="1000"> 
                            <? ($mail->mail_compose_img_error['bcc'] == TRUE) ? print('<img src="/img/xmark.gif">') : NULL; ?>
                          </td>
                        </tr>
                        <tr> 
                          <td align=left nowrap class="akalink"> Subject:</td>
                          <td align="left" valign="top"> <input name="compose[subject]" value="<? print($_POST['compose']['subject']); ?>"  type="text" class="textfields" id="compose[subject]2" style="width:377px;" tabindex="4" size="30" maxlength="64"> 
                            <? ($mail->mail_compose_img_error['subject'] == TRUE) ? print('<img src="/img/xmark.gif">') : NULL; ?>
                          </td>
                        </tr>
                      </table>
                      <table width=382 cellpadding=2 cellspacing=0>
                        <tr class="akalink"> 
                          <td width="13%" align=left nowrap>Priority:</td>
                          <td width="14%" align="left" valign="middle"><input type="radio" name="compose[priority]" value="1" <? if( $_POST['compose']['priority'] == 1 ) print('checked'); ?>>
                            High </td>
                          <td width="7%" align="left"><img src="/img/icons/mailboxes/ico_high_priority.gif" width="12" height="16"></td>
                          <td width="14%" align="left" valign="middle"><input type="radio" name="compose[priority]" value="5" <? if( $_POST['compose']['priority'] == 5 ) print('checked'); ?>>
                            Low </td>
                          <td width="8%" align="left"><img src="/img/icons/mailboxes/ico_low_priority.gif" width="12" height="16"></td>
                          <td width="44%" align="left"><input name="compose[priority]" type="radio" value="3" <? if( $_POST['compose']['priority'] == 3 ) print('checked'); ?>>
                            None </td>
                        </tr>
                      </table>
                      <table width="92%" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td height="21"><img src="/img/prod_line_horizontal.jpg" width="450" height="3"></td>
                        </tr>
                      </table>
                      <table width=70% cellpadding=2 cellspacing=0>
                        <tr> 
                          <td width="72" height="26" align=left valign=middle nowrap class="akalink">Attachments:</td>
                          <td width="241" align="left" valign="top" class="akalink">
                         <input name="attach" type="image" id="save" src="/img/BTN_attach.gif" width="118" height="28" border="0" onMouseOver="window.status='Attach Files.'; return true;" onMouseOut="window.status=''; return true;" onClick="javascript:centerminibook('http://mail.akalink.com/login/compose/attach/',575,500);"> 
                         </td>
                        </tr>
                      </table>
                      <? print($mail->mail_compose_attach_list); ?> <table width="92%" border="0" cellpadding="0" cellspacing="0">
						<tr> 
						  <td height="21"><img src="/img/prod_line_horizontal.jpg" width="450" height="3"></td>
						</tr>
					  </table>
					  <table width="465" height="22" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td width="32%" height="22" valign="bottom"><select name="compose[editmode]" class="dropdowns" id="select4" onChange="if (this.selectedIndex > 0) { submit_form();  } else { return false; }">
                              <option value="#">-- Editing Mode --</option>
                              <option <? print($selectedit[0]); ?> value="0">Plain 
                              Text Editing Mode</option>
                              
                              <? if( !$ae->isnotIEMS() ) {
                              
                              		print('<option ' . $selectedit[1] . ' value="1">Rich Text Editing Mode</option>');
                                }
                              ?>
                            </select></td>
                          <td width="37%" valign="bottom"><input name="compose[include]" <? if( !isset($_GET['action']) ) print('disabled'); ?> type="checkbox" id="compose[include]2" value="1" <? if($_POST['compose']['include'] == 1) print('checked'); ?> onClick="this.document.email.submit()";> 
                            <span class="akalink"> Include original message</span> 
                          </td>
                          <td width="31%" valign="bottom"><input name="sign" <? if( !isset($mail->mail_signature_insert) ) print('disabled'); ?> type="checkbox" id="insertsig" value="1" onClick="if (this.checked) { showLayer('signature'); } else { hideLayer('signature'); }"> 
                            <span class="akalink"> Insert my <a href="http://<? print($mail->server['main']); ?>/login/options/03/" target="_blank">Signature</a></span></td>
                        </tr>
                      </table> </td>
                    <td width="34%" align="left" valign="top"><table width="212" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td width="212" align="left" valign="top"><img src="/img/exp_book_top.gif" width="147" height="23"></td>
                        </tr>
                        <tr> 
                          <td align="left"><table cellspacing=0 cellpadding=0 width="202" border=0>
                              <tbody>
                                <tr> 
                               <td width="534" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
                                    <table width="202" cellpadding="2" cellspacing="1">
                                      <tr bgcolor="#ebebe3" class="akalink"> 
                                        <td width="198" align="left" valign="top" bgcolor="#FFFFFF"> 
                                          <? print($mail->mail_book_xprs_list); ?> 
                                          <table width="202" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="202" height="32" valign="bottom"><a href="javascript:centerminibook('/login/options/10/minibook/',485,300)" onMouseOver="window.status='View everyone in your Address Book'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/btn_view_all_book.gif" width="96" height="28" border="0"></a><a href="javascript:centerwindow('/login/options/10/editlist/',625,330)" onMouseOver="window.status='Edit your Express Book'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/btn_editlist.gif" width="91" height="28" border="0" onMouseOver="window.status='Edit your Express Book.'; return true;" onMouseOut="window.status=''; return true;"></a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </tbody>
                            </table></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr> 
                    <td height="43" align="left" valign="bottom">&nbsp;</td>
                  </tr>
                </table>
                <table width="770" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td width="769" height="167" align="left" valign="top"> <table width="75%" border="0" cellpadding="0" cellspacing="0">
						<tr> 
						  <td height="5"><img src="/img/spcr.gif" width="121" height="3"></td>
						</tr>
					  </table>
					  <? print($editbox); ?> 
					  <? ($mail->mail_compose_img_error['msg'] == TRUE) ? print('<img src="/img/xmark.gif">') : NULL; ?>
				  </tr>
                </table>
                <div id="signature" style="visibility: hidden; display: none;"> 
                  <? print($mail->mail_signature_insert); ?> </div>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                  <tr>    
                    <td width="21%" height="35" valign="bottom"><input name="send" type="image" id="send2" src="/img/btn_sendemail.gif" width="111" height="28" border="0" onMouseOver="window.status='Send this e-mail now.'; return true;" onMouseOut="window.status=''; return true;"></td>
                    <td width="25%" valign="bottom"><input name="save" type="image" id="save2" src="/img/btn_save_as_draft.gif" width="140" height="28" border="0" onMouseOver="window.status='Save and send this e-mail later.'; return true;" onMouseOut="window.status=''; return true;"></td>
                    <td width="54%" valign="bottom"><a href="/login/inbox/"><img src="/img/btn_cancel.gif" width="100" height="28" border="0" onMouseOver="window.status='Cancel this e-mail transaction.'; return true;" onMouseOut="window.status=''; return true;"></a></td>
                  </tr>
                </table>
                <table width="55%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
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
		<? print($mail->mail_book_xprs_hidden_list); ?>
</form>
<script language="JavaScript" type="text/JavaScript">
var frm = document.email;
var composefield = "to";
	
function focusnow(H){
composefield = H;
}

function ADDEXP(expressname){
var elmhurst = frm.elements[expressname].value;
if (frm.elements[composefield].value.length == 0 || frm.elements[composefield].value.indexOf(elmhurst) == -1) 
{
if (frm.elements[composefield].value.length != 0 && frm.elements[composefield].value.charAt(frm.elements[composefield].value.length - 1) != ",")
frm.elements[composefield].value += "; ";
frm.elements[composefield].value += elmhurst;
}
}
</script>
</body>
</html>                                                                   