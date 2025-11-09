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

if( $mail->MailPostIs('submit') ) {
	
	$mail->MailFeedbackRegister($_POST['type'],$_POST['text']);
}

$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
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
            <td height="2"> 
              <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
                <tr> 
                  <td height="2"> 
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
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <? include($mail->tpl['html'] . '/toolbar.html'); ?>
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="29">&nbsp;</td>
            <td width="761" align="left" valign="top"> 
              <table width="714" border="0" cellpadding="0" cellspacing="0" class="akalink">
                <tr> 
                  <td width="714" height="24" valign="bottom"><strong><font color="#FF0000">
                    <? $mail->MailErrorPrint(); ?>
                    </font></strong></td>
                </tr>
                <tr> 
                    <td height="21" valign="bottom">Welcome 
                      <? $mail->MailContactNamePrint(); ?>, we are glad to see you have suggestions on how to make 
                      AKAMail better. </td>
                </tr>
                <tr> 
                  <td height="21" valign="top">At AKALink we value each one of 
                    our clients' needs and opinions, please feel free to share 
                    your suggestions with our developers.</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td height="144" valign="bottom">
                    <table width="94%" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td width="42%" height="20" valign="middle" class="akalink"> 
                            <font color="#0
                            00000"><strong>Type of Feedback: </strong></font> 
                          </td>
                          <td width="58%" rowspan="2" valign="middle" class="akalink">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="16" valign="middle" class="akalink"><select style="width: 200px" name="type" class="dropdowns" id="select2">
							  <option value="0">Please Make a Selection....</option>
							  <option value="1">Report a Bug</option>
							  <option value="2">Design Enhancement</option>
							  <option value="3">Compatibility Enhancement</option>
							  <option value="4">Functionality/Ease of Use</option>
							  <option value="5">Language/Grammatical Issue</option>
							  <option value="6">Clip Art &amp; Smiley Faces</option>
							  <option value="7">Other</option>
							</select></td>
                        </tr>
                        <tr valign="bottom"> 
                          <td height="25" colspan="2" class="akalink"> <font color="#000000"><strong>Your 
                            Comments: </strong></font></td>
                        </tr>
                        <tr valign="top"> 
                          <td height="184" colspan="2"><textarea name="text" cols="80" rows="10"></textarea>
                            <table width="75%" border="0">
                              <tr> 
                                <td height="34" valign="bottom"> <input name="submit" type="image" id="submit" src="/img/BTN_SENDCOMMENTTOAKA.gif" width="145" height="28" border="0"> 
                                  <a href="/login/options/"><img src="/img/btn_cancel.gif" width="100" height="28" border="0"></a> 
                                </td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
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
</form>
</body>
</html>
