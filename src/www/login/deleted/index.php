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
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLimitList();
$mail->MailContactList();
$mail->MailLoginExpire();
$mail->MailAccountReload();

$_SESSION['folder_cur']	= 'Deleted';

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailPostIs('delete') ) {

	$mail->MailMsgDelete($_POST['mid']);
}

if( $mail->MailPostIS('empty') ) {

	$mail->MailFolderEmpty($_SESSION['folder_cur']);
}
		
if( $mail->MailPostIs('moveto') ) {

	$mail->MailMsgMove($_POST['mid'],$_POST['movefolder']);
}

if( $mail->MailPostIs('changestatus') ) {

	$mail->MailMsgStatusUpdate($_POST['mid'],$_POST['status']);
}

$mail->MailStatus();
$mail->MailPageSelect($_POST['action'],$_POST['pagejump']);
$mail->MailPageList();
$mail->MailListSort($_POST['sort']);
$mail->MailList();
$mail->MailFolderView();

if( isset($_SESSION['result']) ) {

	$mail->error['result'] = $_SESSION['result'];
	unset($_SESSION['result']);
}
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<? print($mail->mail_account_reload_time); ?>
<script language="JavaScript">

ie = document.all?1:0
ns4 = document.layers?1:0

function CA(r){
	for (var i=0;i<frm.elements.length;i++) {
		var e = frm.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox')) {
			if (r) {
				hL(e);
				e.checked = true;
			}
			else {
				dL(e);
				e.checked = false;
			}
		}
	}
}
function CCA(CB){
	if (CB.checked) {
		hL(CB);
	}
	else {
		dL(CB);
	}
}
function hL(E){
	if (ie) {
		while (E.tagName!="TR") {
			E=E.parentElement;
		}
	}
	else {
		while (E.tagName!="TR") {
			E=E.parentNode;
		}
	}
	E.style.background = "#E8F2FF";
}
function dL(E){
	if (ie) {
		while (E.tagName!="TR") {
			E=E.parentElement;
		}
	}
	else {
		while (E.tagName!="TR") {
			E=E.parentNode;
		}
	}
	E.style.background = "#ffffff";
}

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

//-->//-->
</script>
<script>
function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
}

</script>
</head>

<STYLE type=text/css>
@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</STYLE>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc">
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
     
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
        <table width="800" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td width="367"><img src="/img/2_dv.gif" width="367" height="31"></td>
              <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/2_in.gif" width="80" height="31" border="0"></a></td>
              <td width="73"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/2_sent.gif" width="73" height="31" border="0"></a></td>
              <td width="120"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/2_del.gif" width="120" height="31" border="0"></a></td>
              <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/2_opt.gif" width="90" height="31" border="0"></a></td>
              <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your e-mail drafts folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/2_draft.gif" width="70" height="31" border="0"></a></td>
            </tr>
          </table>
          <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="29">&nbsp;</td>
              <td width="761" align="left" valign="top"> <table width="770" border="0" cellspacing="0" cellpadding="0">
                   <tr> 
                    <td height="24" class="akalink">&nbsp;</td>
                    <td height="24" valign="bottom" class="akalink"><font color="#000000">You 
                      are using <strong><? print($mail->mail_status['ind_size']); ?> MB </strong> 
                      of your <strong><? print($mail->mail_status['ind_maxsize']); ?> 
                      MB</strong> limit. </font></td>
                  </tr>
                  <tr> 
                    <td width="509" class="akalink"><font color="#000000">Deleted 
                      Items: <strong><? print($mail->mail_status['msg_cnt']); ?></strong></font></td>
                    <td width="261" class="akalink"><img src="<? print($mail->mail_status['ind_img']); ?>" alt="Account Quota Useage Indicator." width="<? print($mail->mail_status['ind_width']); ?>" height="10"></td>
                  </tr>
                  <tr> 
                    <td height="30" valign="middle" class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
                    <td width="261" class="akalink">&nbsp;</td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr> 
                    <td width="98%" align="left" valign="top"><table cellspacing=0 cellpadding=0 width="100%" border=0>
                        <tbody>
                          <tr> 
                            <td align="left" valign="top" bgcolor=#dcdcdc> <table width="100%" cellpadding="2" cellspacing="1">
                                <tr bgcolor="#FFFFFF" class="akalink"> 
                                  <td width="20"> <input type="checkbox" name="allbox"  <? ($mail->mail_list_cnt == 0) ? print('disabled') : NULL; ?> onClick="CA(this.checked);"> 
                                  </td>
                                  <td width="18">
                                <div align="center"><b>
                                
                                <? if( $mail->mail_list_sort == 'mread ASC' ) { ?>
                          	
                               		<input name="sort[mread DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                                <? } else { ?>
                             
                             		<input name="sort[mread ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                          	<? } ?>   
                          </b></div>
                              </td>
                                  <td width="18" bgcolor="#FFFFFF">
                                <div align="center"><b>
                                
                                <? if( $mail->mail_list_sort == 'mpriority ASC' ) { ?>
                          	
                                	<input name="sort[mpriority DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                             	<? } else { ?>
                             
                             		<input name="sort[mpriority ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                                <? } ?>
                          </b></div>
                              </td>
                                  <td width="226" bgcolor="#FFFFFF"><b><b><font color="#000000">From</font></b> 
                              
                              <? if( $mail->mail_list_sort == 'mfrom ASC' ) { ?>
                          	
                              		<input name="sort[mfrom DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                              <? } else { ?>
                             
                             		<input name="sort[mfrom ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             <? } ?>
                             
                                    <font color="#000000"> </font></b></td>
                                  <td width="263"><b><font color="#000000">Subject</font> 
                            
                            <? if( $mail->mail_list_sort == 'msubject ASC' ) { ?>
                          	
                               	<input name="sort[msubject DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                            <?  } else { ?>
                             
                             	<input name="sort[msubject ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0"> 
                             
                            <? } ?>
                          
                             </b></td>
                             <td width="137"><b><font color="#000000">Date 
                             &amp; Time </font> 
                             
                             <? if( $mail->mail_list_sort == 'mdate ASC' ) { ?>
                          	
                                <input name="sort[mdate DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                             <? } else { ?>
                             
                             	<input name="sort[mdate ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">                             
                            <? } ?>
                          
                                    </b></td>
                                  <td width="51"><strong><b><font color="#000000">Size</font> 
                             
                             <? if( $mail->mail_list_sort == 'msize ASC' ) { ?>
                          	
                               <input name="sort[msize DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                            <? } else { ?>
                             
                             	<input name="sort[msize ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                            <? } ?>
                           
                                    </b></strong></td>
                                </tr>
                                <? print($mail->mail_list); ?> 
                              </table>
                              <? print($mail->mail_list_none); ?> </td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="763" border="0" cellpadding="0" cellspacing="0" class="akalink">
                        <tr class="akalink"> 
                          <td width="408" height="31" valign="middle"><a href="javascript:CA(true);" onMouseOver="window.status='Select all e-mails'; return true;" onMouseOut="window.status=''; return true;">Select 
                            All</a> - <a href="javascript:CA(false);" onMouseOver="window.status='Deselect all e-mails'; return true;" onMouseOut="window.status=''; return true;">Deselect 
                            All</a></td>
                          <td width="314" height="31" align="right" valign="middle"> 
                            <div class="akalink">Showing Messages <? print($mail->mail_page_spos); ?> 
                              to <? print($mail->mail_page_epos); ?> 
                              
                              <? if( isset($mail->mail_page_list) ) { ?>
                              
                              		on<font color="#FFFFFF"">-</font> <select name="pagejump" class="dropdowns" onChange="this.document.email.submit()"> 
                                	<? print($mail->mail_page_list); ?> </select></font></div></td><td width="55" valign="middle"><div align="right"> 
                              <? } ?>
                              
                         
                             <?	if( $mail->mail_page_pos > 1 ) { ?>
                        
                       			<input name="action[previous]" type="image" src="/img/btn_previous.jpg" width="51" height="14" border="0">
                        
                             <?	} else { ?>
                        	
                        		<img src="/img/btn_previous_disabled.jpg" width="51" height="14">
                              <? } ?>
                    	  
                            </div></td>
                          <td width="41" align="right" valign="middle"> <font color="#FFFFFF">-</font> 
                            
                        <? if( $mail->mail_page_epos != $mail->mail_status['msg_cnt'] ) { ?>
                        
                        	<input name="action[next]" type="image" src="/img/btn_next.jpg" width="33" height="14" border="0">
                      	
                      	<? } else { ?>
                      		
                      		<img src="/img/btn_next_disabled.jpg" width="33" height="14">
                      	<? } ?>
                      	
                          </td>
                        </tr>
                      </table>
                      
                    <table width="769" border="0" cellspacing="0" cellpadding="0" height="45">
                      <tr valign="middle" class="akalink"> 
                        <td width="318" height="51" valign="bottom"> <input name="delete" type="image" id="delete" src="/img/btn_del.gif" width="100" height="35" border="0" onClick="return confirm('These e-mail messages will be permanently deleted from your account and will be non-recoverable.\nAre you sure you want to delete these selected e-mails?')" onMouseOver="window.status='Delete selected e-mail messages'; return true;" onMouseOut="window.status=''; return true;"> 
						  <input name="empty" type="image" id="empty2" src="/img/btn_empty_foldr.gif" width="120" height="35" border="0" onClick="return confirm('The selected e-mail messages will be permanently deleted from your account and will be non-recoverable.\nAre you sure you want to delete all <? print($mail->mail_status['msg_cnt']); ?>  e-mail messages ?');" onMouseOver="window.status='Delete all e-mail messages in this folder'; return true;" onMouseOut="window.status=''; return true;"> 
                          <input type="image" border="0" name="moveto" src="/img/btn_mvfolder.gif" width="88" height="35" onMouseOver="window.status='Move selected e-mail to a specified folder'; return true;" onMouseOut="window.status=''; return true;"> 
                        </td>
                        <td width="118" height="51" valign="bottom"> <table width="109" border="0">
                            <tr valign="top"> 
                              <td width="101" height="36"> <select name="movefolder" class="dropdowns">
                                  <option value="#">--Select Folder--</option>
                                  <? print($mail->mail_folder_view_move); ?> </select> 
                              </td>
                            </tr>
                          </table></td>
                        <td width="94" height="51" align="left" valign="bottom"> 
                          <input name="changestatus" type="image" id="changestatus2" src="/img/btn_markas.gif" width="94" height="35" border="0"> 
                        </td>
                        <td width="239" height="51" valign="bottom"> <table width="116" border="0">
                            <tr valign="top"> 
                              <td width="110" height="36"> <select name="status" class="dropdowns">
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
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                        </tr>
                      </table> </td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                </table> </td>
          </tr>
        </table>
      
    
    
  <? include($mail->tpl['html'] . '/footer.html'); ?> 
  <script language="JavaScript">
frm = document.email;
</script>
</form>
</body>
</html>
