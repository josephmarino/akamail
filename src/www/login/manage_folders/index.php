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
$mail->MailLoginExpire();

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailPostIs('create') ) {

	$mail->MailFolderRegister($_POST['cnewfolder']);
}

if( $mail->MailPostIs('delete') ) {

	$mail->MailFolderDelete($_POST['mid']);
}

if( $mail->MailPostIs('update') ) {

	$mail->MailFolderUpdate($_POST['tid']);
}

$mail->MailFolderSort($_POST['sort']);
$mail->MailFolderList();
$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
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


function interactivehelp() {

	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');

}

function centerwindow(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no"; 
	theWin=window.open(url,'',features); } 


</script>
 
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
    <tbody> 
    <tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"><table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
            <tr align="left" valign="bottom"> 
              <td height="47" width="11" valign="middle"> <div align="left"></div></td>
              <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"><? print($mail->mail_folder_view_top); ?></td>
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
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td width="2%">&nbsp;</td>
              <td width="98%">
<table width="100%" border="0">
                  <tr> 
                    <td width="98%" height="89" align="left" valign="top"><table width="91%" border="0" cellpadding="0" cellspacing="0">
						<tr> 
						  <td height="34" valign="bottom" class="akalink">Welcome 
							<? $mail->MailContactNamePrint(); ?>, this section allows you to manage your custom folders 
							for your e-mail account(s). </td>
						</tr>
						<tr> 
						  <td height="19" valign="top" class="akalink">Please 
							keep in mind that you can not delete or modify the 
							default folders that AKAMail has created for you.</td>
						</tr>
						<tr> 
						  <td height="27" class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
						</tr>
					  </table>
                      <table width="75%" border="0" cellpadding="0" cellspacing="0">
						<tr> 
						  <td width="100%"><img src="/img/tp_createfolder.gif" width="98" height="15"></td>
						</tr>
					  </table>
					  <table width="357" border="0" cellpadding="0" cellspacing="0">
						<tr> 
						  <td width="37%"><input name="cnewfolder" type="text" class="textfields"  size="16" maxlength="16"></td>
						  <td width="63%"><input name="create" type="image" id="createfolder" src="/img/btn_createfolder.gif" width="130" height="28" border="0"></td>
						</tr>
						<tr>
						  <td width="37%">&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
					  </table>
					  <table cellspacing=0 cellpadding=0 width="100%" border=0>
                        <tbody>
                          <tr> 
                            <td align="left" valign="top" bgcolor=#dcdcdc> <table width="100%" cellpadding="2" cellspacing="1">
								<tr bgcolor="#FFFFFF" class="akalink"> 
								  
                              <td width="24"> 
                                <input type="checkbox" name="allbox" <? if( $mail->mail_folder_cust_cnt == 0 ) print('disabled'); ?> onClick="CA(this.checked);"> 
								  </td>
								  
                              <td width="8"><b> 
                                <? if( $mail->mail_folder_sort == 'share ASC' ) { ?>
                          	
                                	<input name="sort[share DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                              <? } else { ?>
                             
                             		<input name="sort[share ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                              <? } ?>
                          
                                </b></td>
								  
                              <td width="270"><b><b><font color="#000000">Folder 
                                Name </font> 
                           <? if( $mail->mail_folder_sort == 'folder ASC' ) { ?>
                          	
                                <input name="sort[folder DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                            <? } else { ?>
                             
                             	<input name="sort[folder ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                            <? } ?>
                          
                                </b> <font color="#000000"> </font></b></td>
								  
                              <td width="118"><strong><font color="#000000">Messages</font></strong><b> 
                                <? if( $mail->mail_folder_sort == 'count ASC' ) { ?>
                          	
                                	<input name="sort[count DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                                <? } else { ?>
                             
                             		<input name="sort[count ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                               <? } ?>
                          
                                </b></td>
								  
                              <td width="128"><b><font color="#000000">Created 
                                On </font> 
                                <? if( $mail->mail_folder_sort == 'ctime ASC' ) { ?>
                          	
                                	<input name="sort[ctime DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                                <? } else { ?>
                             
                             		<input name="sort[ctime ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                               <? } ?>
                          
                                </b></td>
								  
                              <td width="125"><b><font color="#000000">Last Modified 
                                </font> 
                                <? if( $mail->mail_folder_sort == 'mtime ASC' ) { ?>
                          	
                                	<input name="sort[mtime DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
                             
                                <? } else { ?>
                             
                             		<input name="sort[mtime ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
                             
                              <? } ?>
                           
                                </b></td>
								  
                              	  <td width="51"><strong><b><font color="#000000">Size</font> 
									</b></strong></td>
								</tr>
								<? print($mail->mail_folder_list); ?> </table>
                              <table width="100%" cellpadding="2" cellspacing="1">
								<? print($mail->mail_folder_total); ?>
							  </table></td>
                          </tr>
                        </tbody>
                      </table>
                      
                      <table width="408" border="0" cellpadding="0" cellspacing="0" class="akalink">
                        <tr class="akalink"> 
                          <td width="408" height="21" valign="bottom"><a href="javascript:CA(true);" onMouseOver="window.status='Select all e-mails'; return true;" onMouseOut="window.status=''; return true;">Select 
                            All</a> - <a href="javascript:CA(false);" onMouseOver="window.status='Deselect all e-mails'; return true;" onMouseOut="window.status=''; return true;">Deselect 
                            All</a></td>
                        </tr>
                      </table>
                      <table width="505" border="0" cellspacing="0" cellpadding="0" height="47">
                        <tr valign="middle" class="akalink"> 
                          <td width="505" height="47" valign="bottom"> <input name="update" type="image"  src="/img/btn_vr_savechanges.gif" width="130" height="35" border="0" onMouseOver="window.status='Save changes'; return true;" onMouseOut="window.status=''; return true;">
							<input type="image" border="0" name="delete" src="/img/btn_del.gif" width="100" height="35" onMouseOver="window.status='Delete selected e-mail'; return true;" onMouseOut="window.status=''; return true;">
							<a href="/login/inbox/"><img src="/img/btn_mnfolder_cancel.gif" width="100" height="35" border="0" onMouseOver="window.status=' '; return true;"></a>	
						  </td>
                        </tr>
                      </table></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                </table>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td>&nbsp;</td>
                  </tr>
                </table>
                
              </td>
            </tr>
          </table> </td>
    </tr>
    </tbody> 
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
<script language="JavaScript">
frm = document.email;
</script>
</body>
</html>
