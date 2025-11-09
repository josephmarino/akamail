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

$_SESSION['folder_cur'] = 'Inbox';

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( isset($_SESSION['result']) ) {

	$mail->error['result'] = $_SESSION['result'];
	unset($_SESSION['result']);
}

if( isset($_POST['delete']) ) {

	foreach($_POST['delete'] as $mid => $id ) {
	
		$mail->MailAccountRelease($mid);
	}
}

if( isset($_POST['edit']) ) {

	foreach($_POST['edit'] as $mid => $id) { 
	
		header('Location: https://' . $mail->server['main'] . '/login/othermail/manage/?mid=' . $mid);
		exit();
	}
}	

if( isset($_POST['refresh']) ) {

	foreach($_POST['refresh'] as $mid => $id) {
		
		$mail->MailAccountRefresh($mid);
		$mail->MailAccountNameList($mid);

		if( $mail->mail_account_refresh_cnt > 0 ) {

			$_SESSION['result'] = $mail->mail_account_refresh_cnt . ' new messages received.';
		
		} else {

			$_SESSION['result'] = $mail->error['result'];
		}
		
		$mail->MailFolderRedirect($mail->mail_account_name_list['folder']);
	}
	
}
  
$mail->MailAccountList();
$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">
<!--

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

<STYLE type=text/css>@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</STYLE>
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
            <td height="47" width="194" valign="top" align="left"> 
              <? print($mail->mail_folder_view_top); ?>
            </td>
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
              <table width="590" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td height="2">&nbsp;</td>
                </tr>
                <tr> 
                    <td class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table cellspacing=0 cellpadding=0 width="100%" border=0>
                <tbody> 
                <tr> 

                  <td bgcolor=#dcdcdc> 
                    <table cellspacing=1 cellpadding=2 width="100%" border=0>
                      <tbody> 
                      <tr class="akalink"> 
                        <td width="3" height="2" align=left valign=center bgcolor="#FFFFFF"><font color="#000000">&nbsp;</font></td>
                        
                        <td width="16" height="2" align=left bgcolor="#FFFFFF"> 
                          <font color="#000000"><b></b></font></td>
                        <td width="173" align=left bgcolor="#FFFFFF"><font color="#000000"><b><b>Mail 
                          Server</b></b></font> </td>
                              <td width="166" height="2" align=left bgcolor="#FFFFFF"><font color="#000000"><b>Nick 
                                Name </b></font></td>
                              <td width="127" height="2" align=left valign=center bgcolor="#FFFFFF"><font color="#000000"><b> 
                                Save E-Mail To</b></font></td>
                        <td width="141" height="2" align=left valign=center bgcolor="#FFFFFF"><font color="#000000"><b>Check 
                          Your Mail<strong> Now</strong></b></font></td>
                        <td width="109" height="2" align=left valign=center bgcolor="#FFFFFF"> 
                          <div align="left"><font color="#000000"><strong>Edit 
                            Account </strong></font></div>
                        </td>
                      </tr>
                     <? print($mail->mail_account_list); ?>
                      </tbody> 
                    </table>
                  </td>
                </tr>
                </tbody> 
              </table>
                <table width="750" border="0">
                  <tr> 
                    <td width="295" height="50"> <a href="https://<? print($mail->server['main']); ?>/login/othermail/manage/" onMouseOver="window.status='Add a POP3 e-mail account to AKAMail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/WEB_ADD_AN_ACCT.gif" width="137" height="30" border="0"></a></td>
                    <td width="445" height="50"> <table width="442" border="0" cellspacing="0" cellpadding="0">
                        <tr class="akalink"> 
                          <td width="22"><img src="/img/auto_chk_icon.jpg" width="16" height="15" alt="AKAMail will automatically check this account for new e-mail."> 
                          </td>
                          <td width="420">Indicates AKAMail will automatically 
                            check this account for new e-mail.</td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
              <p>&nbsp;</p>
            </td>
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
