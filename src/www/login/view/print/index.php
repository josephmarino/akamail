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
session_start();
$mail = new Mail();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( !isset($_GET['mid']) || !$mail->MailMsgIs($_GET['mid']) ) {

	$_SESSION['result']	= $mail->errorcode['78'];
	header('Location: http://' . $mail->server['main'] . '/login/inbox');
}

$mail->MailMsgViewMsg($_GET['mid']);
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<style type="text/css">
@import url(/css/aka.css);
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<TABLE width="100%" height="100%" border="0" cellPadding=0 cellSpacing=0>
  <TBODY>
    <TR> 
      <TD vAlign=top> <div align="center"></div>
        <table width="856" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr> 
            <td width="15">&nbsp;</td>
            <td width="690"><img src="/img/top_logo_left.gif"></td>
            <td width="151" class="akalink">&nbsp;</td>
          </tr>
        </table>
        <TABLE width="100%" border=0 cellpadding=0 cellspacing=0 class="akalink">
          <TR class="akalink"> 
            <TD width=50% valign=top background="/img/thug_mansion.gif"><img src="/img/thug_mansion.gif" width="600" height="1"></td>
          </tr>
          <tr> 
            <td colspan=5 align="left" valign="top"><TABLE width="100%" cellpadding=4 cellspacing=0 border=0>
                <TR bgcolor="#EEFBF4" class="headc"> 
                  <TD width="100%" height="86" align="left" valign="top" class="akalink"><table width="825" border="0">
                      <tr> 
                        <td width="1%" class="akalink"><strong></strong></td>
                        <td width="99%" class="akalink"><strong><font color="#000000">From: <? print($mail->mail_msg_view_header['mfrom']); ?> </font></strong></td>
                      </tr>
                      <tr> 
                        <td class="akalink"><strong></strong></td>
                        <td class="akalink"><strong><font color="#000000">Date: <? print($mail->mail_msg_view_header['mdate']); ?></font></strong></td>
                      </tr>
                      <tr> 
                        <td class="akalink"><strong></strong></td>
                        <td class="akalink"><strong><font color="#000000">To: <? print($mail->mail_msg_view_header['mto']); ?></font></strong></td>
                      </tr>
                      <tr> 
                        <td class="akalink"><strong></strong></td>
                        <td class="akalink"><strong><font color="#000000">Subject: <? print($mail->mail_msg_view_header['msubject']); ?></font></strong></td>
                      </tr>
                    </table>
                  </TD>
                </TR>
              </TABLE></td>
          </tr>
          <tr> 
            <TD width=50% valign=top background="/img/thug_mansion.gif"><img src="/img/thug_mansion.gif" width="600" height="1"></td>
          </tr>
        </table> 
        <table width="846" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="15" height="362">&nbsp;</td>
            <td width="831" align="left" valign="top"><? print($mail->mail_msg_view_msg['mmsg']); ?></td>
          </tr>
        </table> </TD>
    </TR>
  </TBODY>
</TABLE>
</body>
</html>
