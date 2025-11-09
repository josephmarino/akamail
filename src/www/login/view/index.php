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
require($_SERVER['DOCUMENT_ROOT']  . '/include/mimeDecode.php');
session_cache_limiter('private');
session_start();
$mail = new Mail();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();
$mail->MailAccountList();
$mail->MailAccountReload();

$secure = (!isset($_SERVER['HTTPS'])) ? 0 : 1;

if( !isset($_GET['mid']) || !$mail->MailMsgIs($_GET['mid']) ) {

	$_SESSION['result'] 	= $mail->errorcode['78'];
	header('Location: http://' . $mail->server['main'] . '/login/inbox');
	exit();
}

if( $_POST['changestatus1'] ) {

	$_POST['changestatus'] 	= $_POST['changestatus1'];
	$_POST['status'] 	= $_POST['status1'];	
}

if( $_POST['moveto1'] ) {
	
	$_POST['moveto']	= $_POST['moveto1'];
	$_POST['movefolder']	= $_POST['movefolder1'];
}

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_SESSION['folder_cur'] != $_POST['viewfolder'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailPostIs('backto') ) {
	
	$mail->MailFolderRedirect($_SESSION['folder_cur']);
}

if( $mail->MailPostIs('changestatus') ) {
	
	$mail->MailMsgStatusUpdate(array(0 => $_GET['mid']),$_POST['status']);	
}

if( $mail->MailPostIs('moveto') ) {

	$mail->MailMsgMove(array(0 => $_GET['mid']),$_POST['movefolder']);
	$mail->MailFolderRedirect($_SESSION['folder_cur']);	
}

if( $mail->MailPostIs('reply') ) {
	
	if( $secure == 0 ) {
	
		header('Location: http://' . $mail->server['main'] . '/login/compose/?mid=' . $_GET['mid'] . '&action=reply');
		exit();
		
	} else {
	
		header('Location: https://' . $mail->server['main'] . '/login/compose/?mid=' . $_GET['mid'] . '&action=reply');
		exit();
	}
}

if( $mail->MailPostIs('replyall') ) {
	
	if( $secure == 0 ) {
	
		header('Location: http://' . $mail->server['main'] . '/login/compose/?mid=' . $_GET['mid'] . '&action=replyall');
		exit();
	} else {

		header('Location: https://' . $mail->server['main'] . '/login/compose/?mid=' . $_GET['mid'] . '&action=replyall');
		exit();
	}
}

if( $mail->MailPostIs('forward') ) {
	
	unset($_SESSION['compose']['attach']['forward']);
	
	if( $secure == 0 ) {
	
		header('Location: http://' . $mail->server['main'] . '/login/compose/?mid=' . $_GET['mid'] . '&action=forward');
		exit();
	
	} else {
	
		header('Location: https://' . $mail->server['main'] . '/login/compose/?mid=' . $_GET['mid'] . '&action=forward');
		exit();
	}
}

$mail->MailListSort($_POST['sort']);
$mail->MailMsgViewSelect($_GET['mid']);	
$mail->MailMsgViewMsg($_GET['mid']);

if( $mail->mail_msg_view_header['mread'] == 0 ) {

	$mail->MailMsgStatusUpdate(array($_GET['mid']),'mread-1');
}

if( isset($_GET['file']) ) {

	$mail->MailMsgViewAttach($_GET['mid'],$_GET['file']);
}
	
if( $mail->MailPostIs('savedesktop') ) {

	$mail->MailMsgViewDownload($_GET['mid']);
}

if( $mail->MailPostIs('delete') ) {
	
	$mail->MailMsgDelete(array(0 => $_GET['mid']));
	$mail->MailFolderRedirect($_SESSION['folder_cur']);
}

if( $mail->MailPostIs('spamblock') ) {

	$mail->MailMsgBlock(array(0 => $_GET['mid']));	
	$mail->MailFolderRedirect($_SESSION['folder_cur']);
}

if( $mail->MailPostIs('addbook') ) {

	if( $mail->MailBookQuickRegister($mail->mail_msg_view_contact) ) {
	
		$mail->mail_msg_view_contact['book'] = FALSE;
	}
}

if( $mail->MailFormatEmail($mail->mail_msg_view_header['mfrom']) ) {
	
	if( strstr($mail->mail_account_address_list,strtolower($mail->mail_email_match)) || strstr(strtolower($mail->mail_email_match),'akalink.com') ) {
	
		$blockspamdisable = 'disabled';
	}
}
	
switch($mail->mail_option_list['headerview']) {

	case 0:
		$viewheader = '<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="showbrief();">';
		break;
	
	case 1:
		$viewheader = '<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="showdetailed();">';
		break;
}

$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<? print($mail->mail_account_reload_time); ?>
<script language="JavaScript">

function MM_preloadImages() { //v3.0
 	var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    	var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i>a.length; i++)
    	if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}

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

function showbrief() {
	hideLayer('detailed');
	showLayer('brief');
}

function showdetailed() {
	hideLayer('brief');
	showLayer('detailed');
}

function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
}

function virus() {
	h3ll0=window.open('/info/mail/f_virus.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function centerwindow(url,theWidth,theHeight) {  
 var theTop=(screen.height/2)-(theHeight/2);  
 var theLeft=(screen.width/2)-(theWidth/2);  
 var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no";  
 theWin=window.open(url,'',features); 
}  

</script>
<style type="text/css">
@import url("/css/aka.css");
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<? print($viewheader); ?>
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody>
      <tr align=left valign="top"> 
        <td width="808" style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
          <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
            <tr align="left" valign="bottom"> 
              <td height="47" width="11" valign="middle"> <div align="left"></div></td>
              <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"><? print($mail->mail_folder_view_top); ?></td>
            </tr>
          </table>
          <table width="800" border="0" cellspacing="0" cellpadding="0" height="2">
            <tr> 
              <td height="2"><table width="800" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="365" align="left"><img src="/img/1_dv.gif" width="365" height="31"></td>
                    <td width="79" align="left"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
                    <td width="76" align="left"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
                    <td width="119" align="left"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
                    <td width="62" align="left"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
                    <td width="99" align="left"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
                  </tr>
                </table> </td>
            </tr>
          </table>
          <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="792" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td>&nbsp;</td>
            </tr>
          </table>
          <table width="791" border="0">
            <tr> 
              <td width="1" align="left">&nbsp;</td>
              <td width="290" align="left"><input name="backto" type="image" id="backto" src="/img/btn_backto_mailbox.gif" width="94" height="14" border="0">
				<img src="/img/btn_split_view.gif" width="8" height="14"> 
		
		<? if( $mail->mail_view_previous == 0 ) { ?>

                   	<img src="/img/btn_previous_disabled.jpg" width="51" height="14">
                <? } ?>
                   
              
                <? if( $mail->mail_view_previous != 0) { 

                 	print('<a href="/login/view/?mid=' . $mail->mail_view_previous . '"><img src="/img/btn_previous.jpg" onMouseOver="window.status=\'View previous e-mail\'; return true;" onMouseOut="window.status=\'\'; return true;" alt="View previous e-mail" width="51" height="14" border="0"></a>');
                }
               
                ?>

		<img src="/img/btn_split_view.gif" width="8" height="14"> 
		
		<? if( $mail->mail_view_next != 0 ) { 

                  	print('<a href="/login/view/?mid=' . $mail->mail_view_next . '"><img src="/img/btn_next.jpg" onMouseOver="window.status=\'View next e-mail\'; return true;" onMouseOut="window.status=\'\'; return true;"  alt="View next e-mail" width="33" height="14" border="0"></a>');
	           }
               ?>
                      
               <?  if( $mail->mail_view_next == 0 ) { ?>

		 	<img src="/img/btn_next_disabled.jpg" width="33" height="14">
		 	
               <? } ?> 
               
			  </td>
              <td width="477" align="right"><a href="/login/view/print/?mid=<? print($_GET['mid']); ?>" target="_blank"><img src="/img/btn_print_email.gif" onMouseOver="window.status='Print this e-mail'; return true;" onMouseOut="window.status=''; return true;" alt="Print this e-mail" width="100" height="18" border="0"></a> 
                <img src="/img/btn_split.gif" width="8" height="14"> <input name="savedesktop" type="image"  onMouseOver="window.status='Save e-mail to desktop'; return true;" onMouseOut="window.status=''; return true;" src="/img/btn_save_tohd.gif" alt="Save this e-mail to your computer" width="103" height="14" border="0"></td>
            </tr>
          </table>
          <table cellpadding=3 cellspacing=0 border=0 width="800">
            <tr class=bbar bgcolor="80ADC1"> 
              <td width="59%" align="left"><input name="reply" type="submit" id="reply22" value="Reply"> 
                <input name="replyall" type="submit" id="replyall22" value="Reply All"> 
                <input name="delete" type="submit" id="delete22" value="Delete"> 
                <input name="forward" type="submit" id="forward22" value="Forward"> 
                <input name="spamblock" type="submit" id="spamblock2" value="This Is Spam" <? print($blockspamdisable); ?>>
                                  
              </td>
              <td width="7%" align="left"><input name="changestatus" type="submit" id="changestatus3" value="Mark As"></td>
              <td width="13%" align="right"><select name="status" class="dropdowns">
                  <option value="mread-1">Read</option>
                  <option value="mread-0">Unread</option>
                  <option value="#"></option>
                  <option value="mstatus-4">Flagged</option>
                  <option value="mstatus-1">Not Flagged</option>
                  <option value="#"></option>
                  <option value="mpriority-3">No Priority</option>
                  <option value="mpriority-5">Low Priority</option>
                  <option value="mpriority-1">High Priority</option>
                  <option value="#"></option>
                  <option value="mstatus-5">Appointment</option>
                  <option value="mstatus-1">No Appointment</option>
                </select></td>
              <td width="9%" align="left"><input name="moveto" type="submit" id="moveto3" value="Move To"></td>
              <td width="12%" align="right" bgcolor="80ADC1"><select name="movefolder" class="dropdowns" id="select5" >
                  <option value="#">--Select Folder--</option>
                  <? print($mail->mail_folder_view_move); ?> </select></td>
            </tr>
          </table>
          <table width="75%" border="0">
			<tr> 
			  <td width="3%" height="86">&nbsp;</td>
			  <td width="97%" align="left" valign="top"><? print($mail->mail_view_header['mstatus']); ?> 
				<div id="brief" style="visibility: visible; display:"> 
				  <table width="775" border=0 cellpadding=3 cellspacing=0>
					<tr class=akalink> 
					  <td width="7%" height="24" align=right valign=bottom nowrap><b><font color="#000000">Date:</font></b></td>
					  <td width="62%" align="left" valign="bottom"><? print($mail->mail_msg_view_header['mdate']); ?> 
				<?
                        	if( $mail->mail_msg_view_header['mstatus'] ) {
                        	
                        		print('<img src="/img/btn_split_view.gif" width="8" height="14">' . $mail->mail_msg_view_header['mstatus'] . ' ');
  				}
  				
  				?>
					  </td>
					  <td width="31%" align="right" valign="middle"><a href="javascript:showdetailed();"><img src="/img/btn_show_all_headers.jpg" alt="Show all headers for this e-mail" width="102" height="13" border="0" onMouseOver="window.status='Show all headers for this e-mail'; return true;" onMouseOut="window.status=''; return true;"></a> 
						<img src="/img/btn_split.gif" width="8" height="14"> <img src="/img/btn_show_brief_headers_d.jpg" alt="Show only brief headers for this e-mail" width="115" height="13" onMouseOver="window.status='Show brief headers for this emaill'; return true;" onMouseOut="window.status=''; return true;"></td>
					</tr>
				  </table>
				  <table width="775" border=0 cellpadding=3 cellspacing=0>
					<tr class=akalink> 
					  <td width="7%" align=right valign=top nowrap><b><font color="#000000">From:</font></b></td>
					  <td width="73%"><? print($mail->mail_msg_view_header['mfrom']); ?>&nbsp;<img src="/img/btn_split_view.gif" width="8" height="14"> 
						<? if( !isset($blockspamdisable) ) {
                      
                      					print('<input name="spamblock" type="image" id="spamblock23" onMouseOver="window.status=\'Never receive e-mail from this person again\'; return true;" onMouseOut="window.status=\'\'; return true;" src="/img/blk_sender.gif" alt="Never receive e-mail from this person again" width="84" height="12" border="0">');
                      	
                      				 } else {
                      	 
                      	 				print('<img src="/img/blk_sender_d.gif" width="84" height="12">');
                      				 }
                     				 ?>
                     				 
						<img src="/img/btn_split_view.gif" width="8" height="14"> 
				<? if( $mail->mail_msg_view_contact['book'] == TRUE ) {
                                  		
                                	  print('<input name="addbook" type="image" id="addtoaddressbook" onMouseOver="window.status=\'Add this person to your address book\'; return true;" onMouseOut="window.status=\'\'; return true;" src="/img/btn_add_to_addbook.gif" alt="Add this person to your address book" width="130" height="13" border="0">');
                           
                           	} else {
                           
                           		print('<img src="/img/btn_add_to_addbook_d.gif" width="130" height="13">');
                           	}
                             
                        	?>
					  </td>
					  <td width="20%" align="left" valign="middle"><div align="left"><? $mail->MailSecurePrint(); ?></div></td>
					</tr>
				  </table>
				   <?
                         		 if( $mail->mail_msg_view_header['mpriority'] ) {
                             
						print($mail->mail_msg_view_header['mpriority']);
				
			   		 }
                        	   ?>
				  <table width="775" border=0 cellpadding=3 cellspacing=0>
					<tr class=akalink> 
					  <td width="7%" align=right valign=top nowrap><b><font color="#000000">To:</font></b></td>
					  <td width="93%"><? print($mail->mail_msg_view_header['mto']); ?> 
					  </td>
					</tr>
				  </table>
				  <?
                  
                  if( !empty($mail->mail_msg_view_header['mcc']) ) {
                  
                  	print('<table width="775" border=0 cellpadding=3 cellspacing=0>
                    	<tr class=akalink> 
                      	<td width="7%" align=right valign=top nowrap><b><font color="#000000">Cc:</font></b></td>
                      	<td width="93%">' . $mail->mail_msg_view_header['mcc'] . '</td>
                    	</tr>
                  	</table>');
                  }
                  
                  ?>
				  <table cellspacing=0 cellpadding=3 width="775" border=0>
					<tr class=akalink> 
					  <td width="7%" align=right valign=top nowrap><b><font color="#000000">Subject:</font></b></td>
					  <td width="93%"><? print($mail->mail_msg_view_header['msubject']); ?></td>
					</tr>
				  </table>
				  <table width="775" border="0" cellpadding="0" cellspacing="0">
					<tr> 
					  <td><img src="/img/prod_line_horizontal.jpg" width="770" height="3"></td>
					</tr>
				  </table>
				</div>
				<div id="detailed" style="visibility: hidden; display: none;"> 
				  <table width="775" border=0 cellpadding=3 cellspacing=0>
					<tr class=akalink> 
					  <td width="82" height="24" align=right valign=bottom nowrap><b><font color="#000000">Date:</font></b></td>
					  <td width="477" align="left" valign="bottom"><? print($mail->mail_msg_view_header['mdate']); ?> 
				 	<?
                        		if( $mail->mail_msg_view_header['mstatus'] ) {
                        	
                        			print('<img src="/img/btn_split_view.gif" width="8" height="14">' . $mail->mail_msg_view_header['mstatus'] . ' ');
  					}
  					?>
					  </td>
					  <td width="250" align="right" valign="middle"><img src="/img/btn_show_all_headers_d.jpg" alt="Show all headers for this e-mail" width="102" height="13" border="0" onMouseOver="window.status='Show all headers for this e-mail'; return true;" onMouseOut="window.status=''; return true;"> 
						<img src="/img/btn_split.gif" width="8" height="14"> <a href="javascript:showbrief();"><img src="/img/btn_show_brief_headers.jpg" alt="Show only brief headers for this e-mail" width="115" height="13" border="0" onMouseOver="window.status='Show brief headers for this e-mail'; return true;" onMouseOut="window.status=''; return true;"></a></td>
					</tr>
				  </table>
				  <? print($mail->mail_msg_view_highlight_header); ?> 
				  <table width="770" border="0" cellpadding="0" cellspacing="0">
					<tr> 
					  <td width="770"><img src="/img/prod_line_horizontal.jpg" width="770" height="3"></td>
					</tr>
				  </table>
				</div>
				<table width="771" border="0" cellpadding="0" cellspacing="0" <? print('background="' . $mail->mail_msg_view_msg_body . '"'); ?> id="bodymessage">
				  <tr> 
					<td width="771" height="321" align="left" valign="top"><? print('<br>' . $mail->mail_msg_view_msg['mmsg'] . ' '); ?><? print($mail->mail_msg_list_attach); ?> 
					  <? print($mail->mail_msg_view_header['blockmedia']); ?></td>
				  </tr>
				</table>
				<table width="770" border="0" cellpadding="0" cellspacing="0">
				  <tr> 
					<td width="770" height="9"><img src="/img/prod_line_horizontal.jpg" width="770" height="3"></td>
				  </tr>
				</table></td>
			</tr>
		  </table>
		  <table cellpadding=3 cellspacing=0 border=0 width="800">
            <tr class=bbar bgcolor="80ADC1"> 
              <td width="59%" align="left"><input name="reply" type="submit" id="reply2" value="Reply"> 
                <input name="replyall" type="submit" id="replyall2" value="Reply All"> 
                <input name="delete" type="submit" id="delete2" value="Delete"> 
                <input name="forward" type="submit" id="forward2" value="Forward">  
               <input name="spamblock" type="submit" id="spamblock2" value="This Is Spam" <? print($blockspamdisable); ?>>
              </td>
              <td width="7%" align="left"><input name="changestatus1" type="submit" id="changestatus2" value="Mark As"></td>
              <td width="13%" align="right"><select name="status1" class="dropdowns">
                  <option value="mread-1">Read</option>
                  <option value="mread-0">Unread</option>
                  <option value="#"></option>
                  <option value="mstatus-4">Flagged</option>
                  <option value="mstatus-1">Not Flagged</option>
                  <option value="#"></option>
                  <option value="mpriority-3">No Priority</option>
                  <option value="mpriority-5">Low Priority</option>
                  <option value="mpriority-1">High Priority</option>
                  <option value="#"></option>
                  <option value="mstatus-5">Appointment</option>
                  <option value="mstatus-1">No Appointment</option>
                </select></td>
              <td width="9%" align="left"><input name="moveto1" type="submit" id="moveto2" value="Move To"></td>
              <td width="12%" align="right" bgcolor="80ADC1"><select name="movefolder1" class="dropdowns" id="select2" >
                   <option value="#">--Select Folder--</option>
                  <? print($mail->mail_folder_view_move); ?> </select></td>
            </tr>
          </table>
          <table width="791" border="0">
            <tr> 
              <td width="1" align="left">&nbsp;</td>
              <td width="290" align="left"><input name="backto" type="image" id="backto" src="/img/btn_backto_mailbox.gif" width="94" height="14" border="0">
				<img src="/img/btn_split_view.gif" width="8" height="14"> 
                <? if( $mail->mail_view_previous == 0 ) { ?>

                   	<img src="/img/btn_previous_disabled.jpg" width="51" height="14">
                <? } ?>
          
                <?  if( $mail->mail_view_previous != 0) { 

                   	print('<a href="/login/view/?mid=' . $mail->mail_view_previous . '"><img src="/img/btn_previous.jpg" onMouseOver="window.status=\'View previous e-mail\'; return true;" onMouseOut="window.status=\'\'; return true;" alt="View previous e-mail" width="51" height="14" border="0"></a>');

                   } 
                ?>
                  <img src="/img/btn_split_view.gif" width="8" height="14">
                 
                 <? if( $mail->mail_view_next == 0 ) { ?>

		  	<img src="/img/btn_next_disabled.jpg" width="33" height="14">
                 <? } ?>
                
                <?  if( $mail->mail_view_next != 0 ) { 

                       print('<a href="/login/view/?mid=' . $mail->mail_view_next . '"><img src="/img/btn_next.jpg" onMouseOver="window.status=\'View next e-mail\'; return true;" onMouseOut="window.status=\'\'; return true;"  alt="View next e-mail" width="33" height="14" border="0"></a>'); 
		    }
                 ?>
              </td>
              <td width="477" align="right"><a href="/login/view/print/?mid=<? print($_GET['mid']); ?>" target="_blank"><img src="/img/btn_print_email.gif" onMouseOver="window.status='Print this e-mail'; return true;" onMouseOut="window.status=''; return true;" alt="Print this e-mail" width="100" height="18" border="0"></a> 
                <img src="/img/btn_split.gif" width="8" height="14"> <input name="savedesktop" type="image"  onMouseOver="window.status='Save e-mail to desktop'; return true;" onMouseOut="window.status=''; return true;" src="/img/btn_save_tohd.gif" alt="Save this e-mail to your computer" width="103" height="14" border="0"></td>
            </tr>
          </table>
          <table width="792" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td><font color="#FFFFFF" size="1">-</font></td>
            </tr>
          </table></td>
                  </tr>
                </table>
                
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
</body>
</html>