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
$mail	= new Mail();
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

if( $mail->MailPostIs('bookxprs') ) { 

	$mail->MailExpressOptionUpdate($_POST['bookxprs']);	
}

if( $mail->MailPostIs('register') ) {

	$mail->MailExpressRegister($_POST['book']);
}

if( $mail->MailPostIs('release') ) {

	$mail->MailExpressRelease($_POST['xprs']);
}

$mail->MailOptionList();
$mail->MailExpressList();
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

function interactivehelp() {

	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');

}

</script>
<style type="text/css">@import url("/css/aka.css");
A:hover {COLOR: #666666}
</style>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('../../img/compose_eml_d.jpg','../../img/address_book_d.jpg','../../img/collect_email_d.jpg')" link="#0000cc" vlink="#0000cc" alink="#0000cc" onkeydown="if (event.keyCode == 13) { return false; }" onkeyup="if (event.keyCode == 13) { return false; }">
<form method="post" action="" name="email">
  <input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody>
      <tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"><table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
            <tr align="left" valign="bottom"> 
              <td height="47" width="11" valign="middle">&nbsp; </td>
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
              <td width="761" align="left" valign="top"> <table width="771" border="0" cellpadding="0" cellspacing="0" class="akalink">
                  <tr> 
                    <td width="475" height="1"><font color="#0f3f7f" size="3" face="Arial, Helvetica, sans-serif" class="body"><b> 
                      </b></font></td>
                    <td width="296">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td height="23" align="left" valign="top"><font color="#FF0000"><b> 
                      <? $mail->MailErrorPrint(); ?>
                      </b></font></td>
                    <td>&nbsp; </td>
                  </tr>
                </table>
                <table width="742" border="0">
                  <tr valign="bottom"> 
                    <td width="736" height="20"><font color="#000000"><strong><span class="headers">Edit 
                      Your Express Book </span><font face="Arial, Helvetica, sans-serif" size="2"> 
                      </font></strong></font></td>
                  </tr>
                  <tr align="left" valign="top"> 
                    <td> <table width="422" border="0">
                        <tr> 
                          <td width="416" class="akalink"><input name="bookxprs" type="radio" value="1" onClick="email.submit()"  <? ($mail->mail_option_list['bookxprs'] == 1) ? print('checked') : NULL;?>>
                            Always use the 5 most frequently e-mailed addresses.</td>
                        </tr>
                        <tr> 
                          <td class="akalink"><input type="radio" name="bookxprs" value="0" onClick="email.submit()" <? ($mail->mail_option_list['bookxprs'] == 0) ? print('checked') : NULL;?>>
                            Always use the same 5 selected addresses in my Express 
                            Book.</td>
                        </tr>
                      </table>
                      <table width="82" border="0">
                        <tr class="akalink"> 
                          <td height="19" valign="bottom"><strong><font face="Arial,Helvetica,sans-serif" size="2"><font color="#000000">Address 
                            Book Contacts: <? print($mail->mail_express_book_cnt); ?> 
                            </font></font><font face="Arial, Helvetica, sans-serif" size="2"> 
                            </font></strong></td>
                          <td valign="bottom"><strong><font face="Arial,Helvetica,sans-serif" size="2"><font color="#000000">Express 
                            Book Address List: <? print($mail->mail_express_xprs_cnt); ?> 
                            </font><font class="body" color="#0f3f7f" face="Arial, Helvetica, sans-serif" size="2"> 
                            </font></font></strong></td>
                        </tr>
                        <tr> 
                          <td width="46%" align="left" valign="top"><select name="book[]" size="5" multiple class="dropdowns" style=width:20em;>
                              <? print($mail->mail_express_book_list); ?> </select></td>
                          <td width="54%" align="left" valign="top"><select name="xprs[]" size="5" multiple class="dropdowns" style=width:20em;>
                              <? print($mail->mail_express_xprs_list); ?> </select></td>
                        </tr>
                        <tr> 
                          <td height="30" align="left" valign="top"> <input name="register" type="image" id="add" src="/img/btn_add_to_expbook.gif" width="178" height="28" border="0"></td>
                          <td width="54%" align="left" valign="top"> <input name="release" type="image" id="remove" src="/img/btn_rem_from_expbook.gif" width="212" height="28" border="0"></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </tbody>
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
</body>
</html>
